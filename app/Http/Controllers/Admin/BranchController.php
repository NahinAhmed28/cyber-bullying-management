<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin;
use App\Models\Branch;
use App\Models\Upazila;

use App\Models\District;
use App\Models\Division;
use App\Models\OfficeType;
use App\Models\ServiceType;
use App\Scopes\StatusScope;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Guest\AjaxController;
use App\Models\Area;
use App\Models\Association;

class BranchController extends Controller
{
  const VIEW_PATH = 'admin.branch.';
  public function __construct()
  {
  }

  public function index()
  {
    $this->authorize('read',Branch::class);

    // cn number calculation code
    // $branch = Branch::find(3);
    // $cn_numbers = json_decode($branch->cn_numbers, true);
    // dd($cn_numbers);
    
    $authUser = Auth::guard('admin')->user()->load(['userType']);
    $default_role = $authUser->userType->default_role;

    if ($default_role <= Admin::EmbassySuperAdmin) {
      $branches = Branch::withoutGlobalScopes([StatusScope::class])->orderBy('id','desc')->with('association','area','officeType')->utwd()->paginate(100);
    } else {
      //$branches = Branch::with('division','district')->where('code','<',998)->utwd()->paginate(2);
      $branches = Branch::with('association','area','officeType')->orderBy('id','desc')->utwd()->paginate(100);
    }

    //dd($branches);
    return view(self::VIEW_PATH . 'index',compact('branches'));
  }

  public function create()
  {
    $this->authorize('create',App\Branch::class);
    $office_types = OfficeType::get();

    $associations = Association::get();
    $areas = Area::get();
    return view(self::VIEW_PATH . 'add_edit', compact('office_types','associations','areas'));
  }

  public function store(Request $request)
  {
    $this->authorize('create',App\Branch::class);
    //return $request->all();
    $this->validate($request, [
        'title_en' => 'required|min:1|max:128',
        'title_bn' => 'required|min:1|max:128',
        'area_id' => 'required',
        'office_type_id' => 'required',
        //'code' => 'required|unique:branches|min:1|max:128',
    ]);

    //dd($request->all());

    try {
      $branch = DB::table('branches')->orderBy('id','DESC')->first();
      $data = $request->except('_token');
      $authUser = Auth::guard('admin')->user()->id;
      array_walk_recursive($data, function (&$val) {
          $val = trim($val);
          $val = is_string($val) && $val === '' ? null : $val;
      });

      if (!$request->code) {
        if ($branch) {
          $data['code'] = (str_pad(($branch->code + 1), 3, '0', STR_PAD_LEFT));
        } else {
          $data['code'] = str_pad(1, 3, '0', STR_PAD_LEFT);
        }
      }

      //$data['area'] = json_encode($data['area']);

      // if ($data['office_type_id'] == 1) {
      //   $data['percent'] = 100;
      // } else {
      //   $data['percent'] = 75;
      // }
      
      $data['created_by'] = $authUser;
      //dd($data);
      Branch::create($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }

    return redirect()->route('admin.branch')->with([
                    'message' => __('admin.common.success'),
                    'alert-type' => 'success'
                ]);
  }

  public function edit(Request $request, $id)
  {
    $this->authorize('update',App\Branch::class);
    //$branch = Branch::withoutGlobalScopes([StatusScope::class])->where(['id'=>$id])->first();
    $branch = DB::table('branches')->where(['id'=>$id])->first();
    //dd($branch, $id);
    $office_types = OfficeType::get();
    if ( is_null($branch) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    $associations = Association::get();
    $areas = Area::get()->where('association_id');

    //dd($branch);

    return view(self::VIEW_PATH . 'add_edit', compact('office_types','branch','associations','areas'));
  }

  public function update(Request $request, $id)
  {
    $this->authorize('update',App\Branch::class);
    
    $this->validate($request, [
      //'name' => 'required|min:1|max:128',
      'title_en' => 'required|min:1|max:128',
      //'title_bn' => 'required|min:1|max:128',
      'office_type_id' => 'required',
      'area_id' => 'required',
      'code' => ['required', Rule::unique('branches')->ignore($id)],
    ]);

    //dd($request->all());
    try {
      $branch = Branch::withoutGlobalScopes([StatusScope::class])->where(['id'=>$id])->first();
      if ( is_null($branch) == true) {
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
      //$data['area'] = json_encode($data['area']);
      // if ($data['office_type_id'] == 1) {
      //   $data['percent'] = 100;
      // } else {
      //   $data['percent'] = 75;
      // }
      //dd($data);
      Branch::withoutGlobalScopes([StatusScope::class])->find($id)->update($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    return redirect()->route('admin.branch')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  public function delete(Request $request, $id, $sid = 0)
  {    
    $this->authorize('delete',App\Branch::class);
    $branch = Branch::withoutGlobalScopes([StatusScope::class])->find($id);
    if ( is_null($branch) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    try {
      if ($sid==false) {
        $branch->status = false;
        $branch->save();
      } else {
        $branch->delete();
      }
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    
    return redirect()->route('admin.branch')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

}
