<?php

namespace App\Http\Controllers\Admin;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\Association;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
  const VIEW_PATH = 'admin.area.';
  public function __construct()
  {

  }

  public function index()
  {
    $this->authorize('read',Area::class);
    $areas = Area::Utwd()->paginate(100);
    return view(self::VIEW_PATH . 'index',compact('areas'));
  }

  public function create()
  {
    $this->authorize('create',App\Area::class);
    //$associations = Association::Utwd()->get();
    return view(self::VIEW_PATH . 'add_edit');
  }

  public function store(Request $request)
  {
    $this->authorize('create',App\Area::class);
    //return $request->all();
    $this->validate($request, [
        //'name' => 'required|min:1|max:128',
        'title_en' => 'required|min:1|max:128',
        'title_bn' => 'required|min:1|max:128',
    ]);

    try {
      $area = DB::table('areas')->orderBy('id','DESC')->first();
      $data = $request->except('_token');
      $authUser = Auth::guard('admin')->user()->id;
      array_walk_recursive($data, function (&$val) {
          $val = trim($val);
          $val = is_string($val) && $val === '' ? null : $val;
      });

      if ($area) {
        $data['code'] = $area->code + 1;
      } else {
        $data['code'] = 1;
      }
      
      $data['association_id'] = 1;
      $data['created_by'] = $authUser;
      Area::create($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }

    return redirect()->route('admin.area')->with([
                    'message' => __('admin.common.success'),
                    'alert-type' => 'success'
                ]);
  }

  public function edit(Request $request, $id)
  {
    $this->authorize('update',App\Area::class);
    $area = Area::Utwd()->where(['id'=>$id])->first();
    if ( is_null($area) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }
    //$associations = Association::Utwd()->get();
    return view(self::VIEW_PATH . 'add_edit', compact('area'));
  }

  public function update(Request $request, $id)
  {
    $this->authorize('update',App\Area::class);
    //dd($request->all());
    $this->validate($request, [
      //'name' => 'required|min:1|max:128',
      'title_en' => 'required|min:1|max:128',
      'title_bn' => 'required|min:1|max:128',
    ]);

    try {
      $area = Area::where(['id'=>$id])->first();
      if ( is_null($area) == true) {
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

      Area::find($id)->update($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    return redirect()->route('admin.area')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  public function delete(Request $request, $id, $sid = 0)
  {    
    $this->authorize('delete',App\Area::class);
    $area = Area::Utwd()->find($id);
    if ( is_null($area) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    try {
      if ($sid==false) {
        $area->status = false;
        $area->save();
      } else {
        $area->delete();
      }
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    
    return redirect()->route('admin.area')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

}
