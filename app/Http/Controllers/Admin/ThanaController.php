<?php

namespace App\Http\Controllers\Admin;
use App\Models\Thana;
use App\Models\District;
use App\Models\Division;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ThanaController extends Controller
{
  const VIEW_PATH = 'admin.thana.';
  public function __construct()
  {

  }

  public function index()
  {
    $this->authorize('read',Thana::class);
    $thanas = Thana::with('division','district')->get();
    return view(self::VIEW_PATH . 'index',compact('thanas'));
  }

  public function create()
  {
    $this->authorize('create',App\Thana::class);
    $divisions = Division::get();
    $districts = District::get();
    return view(self::VIEW_PATH . 'add_edit', compact('divisions','districts'));
  }

  public function store(Request $request)
  {
    $this->authorize('create',App\Thana::class);
    //return $request->all();
    $this->validate($request, [
        //'name' => 'required|min:1|max:128',
        'title_en' => 'required|min:1|max:128',
        'title_bn' => 'required|min:1|max:128',
        'division_id' => 'required',
        'district_id' => 'required',
    ]);

    try {
      $thana = DB::table('thanas')->orderBy('id','DESC')->first();
      $data = $request->except('_token');
      $authUser = Auth::guard('admin')->user()->id;
      array_walk_recursive($data, function (&$val) {
          $val = trim($val);
          $val = is_string($val) && $val === '' ? null : $val;
      });

      // if ($thana) {
      //   $data['code'] = $thana->code + 1;
      // } else {
      //   $data['code'] = 1;
      // }
      $data['created_by'] = $authUser;
      Thana::create($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }

    return redirect()->route('admin.thana')->with([
                    'message' => __('admin.common.success'),
                    'alert-type' => 'success'
                ]);
  }

  public function edit(Request $request, $id)
  {
    $this->authorize('update',App\Thana::class);
    $thana = Thana::where(['id'=>$id])->first();

    $divisions = Division::get();
    $districts = District::get()->where('division_id',$thana->division_id);
    if ( is_null($thana) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }
    return view(self::VIEW_PATH . 'add_edit', compact('thana','divisions','districts'));
  }

  public function update(Request $request, $id)
  {
    $this->authorize('update',App\Thana::class);
    //dd($request->all());
    $this->validate($request, [
      //'name' => 'required|min:1|max:128',
      'title_en' => 'required|min:1|max:128',
      'title_bn' => 'required|min:1|max:128',
      'division_id' => 'required',
        'district_id' => 'required',
    ]);

    try {
      $thana = Thana::where(['id'=>$id])->first();
      if ( is_null($thana) == true) {
        return back()->with([
          'error' => __('admin.common.error'),
          'alert-type' => 'error'
        ]);
      }
      $data = $request->except('_token');
      $authUser = Auth::guard('admin')->user()->id;
      array_walk_recursive($data, function (&$val) {
          $val = trim($val);
          $val = is_string($val) && $val === '' ? null : $val;
      });

      $data['updated_by'] = $authUser;
      Thana::find($id)->update($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    return redirect()->route('admin.thana')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  public function delete(Request $request, $id, $sid = 0)
  {    
    $this->authorize('delete',App\Thana::class);
    $thana = Thana::find($id);
    if ( is_null($thana) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    try {
      if ($sid==false) {
        $thana->status = false;
        $thana->save();
      } else {
        $thana->delete();
      }
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    
    return redirect()->route('admin.thana')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

}
