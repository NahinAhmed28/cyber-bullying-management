<?php

namespace App\Http\Controllers\Admin;
use App\Models\CaseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CaseTypeController extends Controller
{
  const VIEW_PATH = 'admin.case_type.';
  public function __construct()
  {

  }

  public function index()
  {
    $this->authorize('read',CaseType::class);
    $case_types = CaseType::get();
    return view(self::VIEW_PATH . 'index',compact('case_types'));
  }

  public function create()
  {
    $this->authorize('create',App\CaseType::class);
    return view(self::VIEW_PATH . 'add_edit');
  }

  public function store(Request $request)
  {
    $this->authorize('create',App\CaseType::class);
    //return $request->all();
    $this->validate($request, [
        //'name' => 'required|min:1|max:128',
        'title_en' => 'required|min:1|max:128',
        'title_bn' => 'required|min:1|max:128',
    ]);

    try {
      $case_type = DB::table('case_types')->orderBy('id','DESC')->first();
      $data = $request->except('_token');
      $authUser = Auth::guard('admin')->user()->id;
      array_walk_recursive($data, function (&$val) {
          $val = trim($val);
          $val = is_string($val) && $val === '' ? null : $val;
      });

      if ($case_type) {
        $data['code'] = $case_type->code + 1;
      } else {
        $data['code'] = 1;
      }
      
      $data['created_by'] = $authUser;
      CaseType::create($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }

    return redirect()->route('admin.case_type')->with([
                    'message' => __('admin.common.success'),
                    'alert-type' => 'success'
                ]);
  }

  public function edit(Request $request, $id)
  {
    $this->authorize('update',App\CaseType::class);
    $case_type = CaseType::where(['id'=>$id])->first();
    if ( is_null($case_type) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }
    return view(self::VIEW_PATH . 'add_edit', compact('case_type'));
  }

  public function update(Request $request, $id)
  {
    $this->authorize('update',App\CaseType::class);
    //dd($request->all());
    $this->validate($request, [
      //'name' => 'required|min:1|max:128',
      'title_en' => 'required|min:1|max:128',
      'title_bn' => 'required|min:1|max:128',
    ]);

    try {
      $case_type = CaseType::where(['id'=>$id])->first();
      if ( is_null($case_type) == true) {
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

      CaseType::find($id)->update($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    return redirect()->route('admin.case_type')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  public function delete(Request $request, $id, $sid = 0)
  {    
    $this->authorize('delete',App\CaseType::class);
    $case_type = CaseType::find($id);
    if ( is_null($case_type) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    try {
      if ($sid==false) {
        $case_type->status = false;
        $case_type->save();
      } else {
        $case_type->delete();
      }
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    
    return redirect()->route('admin.case_type')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

}
