<?php

namespace App\Http\Controllers\Admin;
use App\Models\Area;
use App\Models\BranchUnit;
use App\Models\Association;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;

class BranchUnitController extends Controller
{
  const VIEW_PATH = 'admin.branch_unit.';
  public function __construct()
  {

  }

  public function index()
  {
    $this->authorize('read',BranchUnit::class);
    $areas = BranchUnit::Utwd()->orderBy('id','desc')->paginate(100);
    return view(self::VIEW_PATH . 'index',compact('areas'));
  }

  public function create()
  {
    $this->authorize('create',App\BranchUnit::class);
    $associations = Association::Utwd()->get();
    $areas = Area::get();
    $branches = Branch::get();
    return view(self::VIEW_PATH . 'add_edit',compact('associations','areas','branches'));
  }

  public function store(Request $request)
  {
    $this->authorize('create',App\BranchUnit::class);
    //return $request->all();
    $this->validate($request, [
        //'name' => 'required|min:1|max:128',
        'title_en' => 'required|min:1|max:128',
        'title_bn' => 'required|min:1|max:128',
    ]);

    try {
      $branch_unit = DB::table('branch_units')->orderBy('id','DESC')->first();
      $data = $request->except('_token');
      $authUser = Auth::guard('admin')->user()->id;
      array_walk_recursive($data, function (&$val) {
          $val = trim($val);
          $val = is_string($val) && $val === '' ? null : $val;
      });

      if ($branch_unit) {
        $data['code'] = $branch_unit->code + 1;
      } else {
        $data['code'] = 1;
      }
      
      $data['created_by'] = $authUser;
      BranchUnit::create($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }

    return redirect()->route('admin.branch_unit')->with([
                    'message' => __('admin.common.success'),
                    'alert-type' => 'success'
                ]);
  }

  public function edit(Request $request, $id)
  {
    $this->authorize('update',App\BranchUnit::class);
    $branch_unit = BranchUnit::Utwd()->where(['id'=>$id])->first();
    if ( is_null($branch_unit) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    $associations = Association::Utwd()->get();
    $areas = Area::get()->where('association_id',$branch_unit->association_id);
    $branches = Branch::get()->where('area_id',$branch_unit->area_id);
    return view(self::VIEW_PATH . 'add_edit', compact('branch_unit','associations','areas','branches'));
  }

  public function update(Request $request, $id)
  {
    $this->authorize('update',App\BranchUnit::class);
    //dd($request->all());
    $this->validate($request, [
      //'name' => 'required|min:1|max:128',
      'title_en' => 'required|min:1|max:128',
      'title_bn' => 'required|min:1|max:128',
    ]);

    try {
      $branch_unit = BranchUnit::where(['id'=>$id])->first();
      if ( is_null($branch_unit) == true) {
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

      BranchUnit::find($id)->update($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    return redirect()->route('admin.branch_unit')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  public function delete(Request $request, $id, $sid = 0)
  {    
    $this->authorize('delete',App\BranchUnit::class);
    $branch_unit = BranchUnit::Utwd()->find($id);
    if ( is_null($branch_unit) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    try {
      if ($sid==false) {
        $branch_unit->status = false;
        $branch_unit->save();
      } else {
        $branch_unit->delete();
      }
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    
    return redirect()->route('admin.branch_unit')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

}
