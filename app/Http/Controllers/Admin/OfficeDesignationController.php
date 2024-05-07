<?php

namespace App\Http\Controllers\Admin;
use App\Models\OfficeDesignation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OfficeDesignationController extends Controller
{
  const VIEW_PATH = 'admin.office_designation.';
  public function __construct()
  {

  }

  public function index()
  {
    $this->authorize('read',OfficeDesignation::class);
    $office_designations = OfficeDesignation::get();
    return view(self::VIEW_PATH . 'index',compact('office_designations'));
  }

  public function create()
  {
    $this->authorize('create',App\OfficeDesignation::class);
    return view(self::VIEW_PATH . 'add_edit');
  }

  public function store(Request $request)
  {
    $this->authorize('create',App\OfficeDesignation::class);
    //return $request->all();
    $this->validate($request, [
        //'name' => 'required|min:1|max:128',
        'title_en' => 'required|min:1|max:128',
        'title_bn' => 'required|min:1|max:128',
    ]);

    try {
      $office_designation = DB::table('office_designations')->orderBy('id','DESC')->first();
      $data = $request->except('_token');
      $authUser = Auth::guard('admin')->user()->id;
      array_walk_recursive($data, function (&$val) {
          $val = trim($val);
          $val = is_string($val) && $val === '' ? null : $val;
      });

      if ($office_designation) {
        $data['code'] = $office_designation->code + 1;
      } else {
        $data['code'] = 1;
      }
      
      $data['created_by'] = $authUser;
      OfficeDesignation::create($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }

    return redirect()->route('admin.office_designation')->with([
                    'message' => __('admin.common.success'),
                    'alert-type' => 'success'
                ]);
  }

  public function edit(Request $request, $id)
  {
    $this->authorize('update',App\OfficeDesignation::class);
    $office_designation = OfficeDesignation::where(['id'=>$id])->first();
    if ( is_null($office_designation) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }
    return view(self::VIEW_PATH . 'add_edit', compact('office_designation'));
  }

  public function update(Request $request, $id)
  {
    $this->authorize('update',App\OfficeDesignation::class);
    //dd($request->all());
    $this->validate($request, [
      //'name' => 'required|min:1|max:128',
      'title_en' => 'required|min:1|max:128',
      'title_bn' => 'required|min:1|max:128',
    ]);

    try {
      $office_designation = OfficeDesignation::where(['id'=>$id])->first();
      if ( is_null($office_designation) == true) {
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

      OfficeDesignation::find($id)->update($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    return redirect()->route('admin.office_designation')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  public function delete(Request $request, $id, $sid = 0)
  {    
    $this->authorize('delete',App\OfficeDesignation::class);
    $office_designation = OfficeDesignation::find($id);
    if ( is_null($office_designation) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    try {
      if ($sid==false) {
        $office_designation->status = false;
        $office_designation->save();
      } else {
        $office_designation->delete();
      }
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    
    return redirect()->route('admin.office_designation')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

}
