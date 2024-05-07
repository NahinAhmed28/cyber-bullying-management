<?php

namespace App\Http\Controllers\Admin;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServiceTypeController extends Controller
{
  const VIEW_PATH = 'admin.service_type.';
  public function __construct()
  {

  }

  public function index()
  {
    $this->authorize('read',ServiceType::class);
    $service_types = ServiceType::Stwd()->get();
    return view(self::VIEW_PATH . 'index',compact('service_types'));
  }

  public function create()
  {
    $this->authorize('create',App\ServiceType::class);
    return view(self::VIEW_PATH . 'add_edit');
  }

  public function store(Request $request)
  {
    $this->authorize('create',App\ServiceType::class);
    //return $request->all();
    $this->validate($request, [
        //'name' => 'required|min:1|max:128',
        'title_en' => 'required|min:1|max:128',
        'title_bn' => 'required|min:1|max:128',
    ]);

    try {
      $service_type = DB::table('service_types')->orderBy('id','DESC')->first();
      $data = $request->except('_token');
      $authUser = Auth::guard('admin')->user()->id;
      array_walk_recursive($data, function (&$val) {
          $val = trim($val);
          $val = is_string($val) && $val === '' ? null : $val;
      });

      if ($service_type) {
        $data['code'] = $service_type->code + 1;
      } else {
        $data['code'] = 1;
      }
      
      $data['created_by'] = $authUser;
      ServiceType::create($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }

    return redirect()->route('admin.service_type')->with([
                    'message' => __('admin.common.success'),
                    'alert-type' => 'success'
                ]);
  }

  public function edit(Request $request, $id)
  {
    $this->authorize('update',App\ServiceType::class);
    $service_type = ServiceType::Stwd()->where(['id'=>$id])->first();
    if ( is_null($service_type) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }
    return view(self::VIEW_PATH . 'add_edit', compact('service_type'));
  }

  public function update(Request $request, $id)
  {
    $this->authorize('update',App\ServiceType::class);
    //dd($request->all());
    $this->validate($request, [
      //'name' => 'required|min:1|max:128',
      'title_en' => 'required|min:1|max:128',
      'title_bn' => 'required|min:1|max:128',
    ]);

    try {
      $service_type = ServiceType::where(['id'=>$id])->first();
      if ( is_null($service_type) == true) {
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

      ServiceType::find($id)->update($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    return redirect()->route('admin.service_type')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  public function delete(Request $request, $id, $sid = 0)
  {    
    $this->authorize('delete',App\ServiceType::class);
    $service_type = ServiceType::find($id);
    if ( is_null($service_type) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    try {
      if ($sid==false) {
        $service_type->status = false;
        $service_type->save();
      } else {
        $service_type->delete();
      }
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    
    return redirect()->route('admin.service_type')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

}
