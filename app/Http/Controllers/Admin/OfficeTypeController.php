<?php

namespace App\Http\Controllers\Admin;
use App\Models\OfficeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OfficeTypeController extends Controller
{
  const VIEW_PATH = 'admin.office_type.';
  public function __construct()
  {

  }

  public function index()
  {
    $this->authorize('read',OfficeType::class);
    $office_types = OfficeType::get();
    return view(self::VIEW_PATH . 'index',compact('office_types'));
  }

  public function create()
  {
    $this->authorize('create',App\OfficeType::class);
    return view(self::VIEW_PATH . 'add_edit');
  }

  public function store(Request $request)
  {
    $this->authorize('create',App\OfficeType::class);
    //return $request->all();
    $this->validate($request, [
        //'name' => 'required|min:1|max:128',
        'title_en' => 'required|min:1|max:128',
        'title_bn' => 'required|min:1|max:128',
    ]);

    try {
      $office_type = DB::table('office_types')->orderBy('id','DESC')->first();
      $data = $request->except('_token');
      $authUser = Auth::guard('admin')->user()->id;
      array_walk_recursive($data, function (&$val) {
          $val = trim($val);
          $val = is_string($val) && $val === '' ? null : $val;
      });

      if ($office_type) {
        $data['code'] = $office_type->code + 1;
      } else {
        $data['code'] = 1;
      }
      
      $data['created_by'] = $authUser;
      OfficeType::create($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }

    return redirect()->route('admin.office_type')->with([
                    'message' => __('admin.common.success'),
                    'alert-type' => 'success'
                ]);
  }

  public function edit(Request $request, $id)
  {
    $this->authorize('update',App\OfficeType::class);
    $office_type = OfficeType::where(['id'=>$id])->first();
    if ( is_null($office_type) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }
    return view(self::VIEW_PATH . 'add_edit', compact('office_type'));
  }

  public function update(Request $request, $id)
  {
    $this->authorize('update',App\OfficeType::class);
    //dd($request->all());
    $this->validate($request, [
      //'name' => 'required|min:1|max:128',
      'title_en' => 'required|min:1|max:128',
      'title_bn' => 'required|min:1|max:128',
    ]);

    try {
      $office_type = OfficeType::where(['id'=>$id])->first();
      if ( is_null($office_type) == true) {
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

      OfficeType::find($id)->update($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    return redirect()->route('admin.office_type')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  public function delete(Request $request, $id, $sid = 0)
  {    
    $this->authorize('delete',App\OfficeType::class);
    $office_type = OfficeType::find($id);
    if ( is_null($office_type) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    try {
      if ($sid==false) {
        $office_type->status = false;
        $office_type->save();
      } else {
        $office_type->delete();
      }
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    
    return redirect()->route('admin.office_type')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

}
