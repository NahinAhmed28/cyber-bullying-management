<?php

namespace App\Http\Controllers\Admin;
use App\Models\Service;
use App\Models\Category;
use App\Models\ServiceType;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
  const VIEW_PATH = 'admin.service.';
  public function __construct()
  {

  }

  public function index()
  {
    $this->authorize('read',Service::class);
    $services = Service::with('serviceType','category')->stwd()->get();
    return view(self::VIEW_PATH . 'index',compact('services'));
  }

  public function create()
  {
    $this->authorize('create',App\Service::class);

    $categories = Category::get();
    $service_types = ServiceType::Stwd()->get();
    return view(self::VIEW_PATH . 'add_edit', compact('service_types','categories'));
  }

  public function store(Request $request)
  {
    $this->authorize('create',App\Service::class);
    //dd($request->all());
    $this->validate($request, [
        //'name' => 'required|min:1|max:128',
        'title_en' => 'required|min:1|max:128',
        'title_bn' => 'required|min:1|max:128',
        'govt_charge' => 'required',
        'service_charge' => 'required',
        'category_id' => 'required',
        'service_type_id' => 'required',
    ]);

    try {
      $service = DB::table('services')->orderBy('id','DESC')->first();
      $data = $request->except('_token');
      $authUser = Auth::guard('admin')->user()->id;
      array_walk_recursive($data, function (&$val) {
          $val = trim($val);
          $val = is_string($val) && $val === '' ? null : $val;
      });

      if ($service) {
        $data['code'] = $service->code + 1;
      } else {
        $data['code'] = 1;
      }
      $data['total_charge'] = $request->govt_charge+$request->service_charge;
      $data['created_by'] = $authUser;
      Service::create($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }

    return redirect()->route('admin.service')->with([
                    'message' => __('admin.common.success'),
                    'alert-type' => 'success'
                ]);
  }

  public function edit(Request $request, $id)
  {
    $this->authorize('update',App\Service::class);
    $service = Service::with('serviceType','category')->where(['id'=>$id])->first();
    if ( is_null($service) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    $categories = Category::get();
    $service_types = ServiceType::Stwd()->get();
    return view(self::VIEW_PATH . 'add_edit', compact('service','service_types','categories'));
  }

  public function update(Request $request, $id)
  {
    $this->authorize('update',App\Service::class);
    
    $this->validate($request, [
      //'name' => 'required|min:1|max:128',
      'title_en' => 'required|min:1|max:128',
      'title_bn' => 'required|min:1|max:128',
      'govt_charge' => 'required',
      'service_charge' => 'required',
      'category_id' => 'required',
      'service_type_id' => 'required',
    ]);

    try {
      $service = Service::where(['id'=>$id])->first();
      if ( is_null($service) == true) {
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
      $data['total_charge'] = $request->govt_charge+$request->service_charge;
      $data['updated_by'] = $authUser;

      Service::find($id)->update($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    return redirect()->route('admin.service')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  public function delete(Request $request, $id, $sid = 0)
  {    
    $this->authorize('delete',App\Service::class);
    $service = Service::find($id);
    if ( is_null($service) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    try {
      if ($sid==false) {
        $service->status = false;
        $service->save();
      } else {
        $service->delete();
      }
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    
    return redirect()->route('admin.service')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

}
