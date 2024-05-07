<?php

namespace App\Http\Controllers\Admin;
use App\Models\Condition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ConditionController extends Controller
{
  const VIEW_PATH = 'admin.condition.';
  public function __construct()
  {

  }

  public function index()
  {
    $this->authorize('read',Condition::class);
    $sizes = Condition::get();
    return view(self::VIEW_PATH . 'index',compact('sizes'));
  }

  public function create()
  {
    $this->authorize('create',App\Condition::class);
    return view(self::VIEW_PATH . 'add_edit');
  }

  public function store(Request $request)
  {
    $this->authorize('create',App\Condition::class);
    //return $request->all();
    $this->validate($request, [
        //'name' => 'required|min:1|max:128',
        'title_en' => 'required|min:1|max:128',
        'title_bn' => 'required|min:1|max:128',
    ]);

    try {
      $condition = DB::table('conditions')->orderBy('id','DESC')->first();
      $data = $request->except('_token');
      $authUser = Auth::guard('admin')->user()->id;
      array_walk_recursive($data, function (&$val) {
          $val = trim($val);
          $val = is_string($val) && $val === '' ? null : $val;
      });

      if ($condition) {
        $data['code'] = $condition->code + 1;
      } else {
        $data['code'] = 1;
      }
      
      $data['created_by'] = $authUser;

      //dd($data);
      Condition::create($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }

    return redirect()->route('admin.condition')->with([
                    'message' => __('admin.common.success'),
                    'alert-type' => 'success'
                ]);
  }

  public function edit(Request $request, $id)
  {
    $this->authorize('update',App\Condition::class);
    $condition = Condition::where(['id'=>$id])->first();
    if ( is_null($condition) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }
    return view(self::VIEW_PATH . 'add_edit', compact('condition'));
  }

  public function update(Request $request, $id)
  {
    $this->authorize('update',App\Condition::class);
    //dd($request->all());
    $this->validate($request, [
      //'name' => 'required|min:1|max:128',
      'title_en' => 'required|min:1|max:128',
      'title_bn' => 'required|min:1|max:128',
    ]);

    try {
      $condition = Condition::where(['id'=>$id])->first();
      if ( is_null($condition) == true) {
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

      Condition::find($id)->update($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    return redirect()->route('admin.condition')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  public function delete(Request $request, $id, $sid = 0)
  {    
    $this->authorize('delete',App\Condition::class);
    $condition = Condition::find($id);
    if ( is_null($condition) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    try {
      if ($sid==false) {
        $condition->status = false;
        $condition->save();
      } else {
        $condition->delete();
      }
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    
    return redirect()->route('admin.condition')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

}
