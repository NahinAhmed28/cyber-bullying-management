<?php

namespace App\Http\Controllers\Admin;
use App\Models\Area;
use App\Models\Role;
use App\Models\Admin;
use App\Models\Branch;
use App\Models\Status;
use App\Models\Upazila;


use App\Models\District;
use App\Models\Division;
use App\Models\UserType;
use Barryvdh\DomPDF\PDF;
use App\Models\BranchUser;
use App\Models\Association;
use App\Models\ServiceType;

use App\Scopes\StatusScope;
use Illuminate\Support\Str;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Helper\EnglishToBanglaDate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;

class BranchUserController extends Controller
{
  
  const VIEW_PATH = 'admin.branch_user.';
  public function __construct()
  {
  }

  public function index(Request $request)
  {
    $branch_users = BranchUser::with('role','userType','association','area','branch')->where('user_type_id','>',Admin::DEFAULT_ROLE_LIST[8])->utwd()->orderBy('id','desc')->paginate(100);
    return view(self::VIEW_PATH . 'index',compact('branch_users'));
  }

  public function create()
  {
    //$this->authorize('create',BranchUser::class);
    $authUser = Auth::guard('admin')->user()->load(['userType']);
    $user_types = UserType::utwd()->where('default_role','>',Admin::DEFAULT_ROLE_LIST[8])->get();
    $roles = Role::utwd()->where('id','>',Admin::DEFAULT_ROLE_LIST[8])->get();
    if ($authUser->userType->default_role == Admin::ESCOperator) {
      $areas = Area::get();
      $branches = Branch::where(['id'=>$authUser->branch_id])->get();
    } else {
      $areas = Area::get();
      $branches = Branch::get();
    }
    
    return view(self::VIEW_PATH . 'add_edit', compact('user_types','roles','areas','branches'));
  }

  public function store(Request $request)
  {
    
    //$this->authorize('create',BranchUser::class);
    $this->validate($request, [
      'thumb' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:20000',
      //'thumb' => 'required',
      'status' => 'required',
      //'name' => 'required|min:1|max:128',
      'title_en' => 'required|min:1|max:128',
      'title_bn' => 'required|min:1|max:128',
      'username' => 'required|unique:admins|min:1|max:128',
      'email' => 'required|email|unique:admins|min:1|max:128',
      'password' => 'required|confirmed|min:6',
      'area_id' => 'required',
      'branch_id' => 'required',
    ]);

    //dd($request->all());
    $authUser = Auth::guard('admin')->user()->load(['userType']);
    if (BranchUser::DEFAULT_ROLE_LIST[1] != $authUser->userType->default_role) {
      if ($request->user_type_id <= BranchUser::DEFAULT_ROLE_LIST[8]) {
        return back()->with([
          'error' => __('admin.common.error'),
          'alert-type' => 'error'
        ]);
      }
    }

    //dd($request->all());

    try {
      $data = $request->except('_token');
      $authAdmin = Auth::guard('admin')->user()->id;
      array_walk_recursive($data, function (&$val) {
          $val = trim($val);
          $val = is_string($val) && $val === '' ? null : $val;
      });

      $branch_user = DB::table('admins')->orderBy('id','DESC')->first();

      if ($branch_user) {
        $data['code'] = $branch_user->code + 1;
      } else {
        $data['code'] = 1;
      }


      $data['remember_token'] = Str::random(10);
      $data['email_verified_at'] = now();
      $data['created_by'] = $authAdmin;
      $data['password'] = Hash::make($request->password);
      if ($request->hasFile('thumb')) {
        $thumb = $request->file('thumb');
        $randNumber = rand(1, 999);
        $name = 'thumb-' . $authAdmin . '-' . time() . $randNumber . '.' . $thumb->getClientOriginalExtension();
        $year = date('Y/');
        $month = date('F/');
        $destinationPath = storage_path('app/public/branch_user/' . $year . $month);
        $thumb->move($destinationPath, $name);
        $filePath = 'branch_user/' . $year . $month;
        $data['thumb'] = $filePath . '' . $name;
      }

      $data['username'] = $data['email'];


      BranchUser::create($data);
      Cache::forget('locWiseAuthUserInfo');
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }

    return redirect()->route('admin.branch_user')->with([
                    'message' => __('admin.common.success'),
                    'alert-type' => 'success'
                ]);
  }

  public function edit(Request $request, $id)
  {



    //$this->authorize('update',BranchUser::class);
    $branch_user = DB::table('admins')->where(['id'=>$id])->first();
    $user_types = UserType::utwd()->where('default_role','>',Admin::DEFAULT_ROLE_LIST[8])->get();
    $roles = Role::utwd()->where('id','>',Admin::DEFAULT_ROLE_LIST[8])->get();

    $authUser = Auth::guard('admin')->user()->load(['userType']);
    $role = $authUser->userType->default_role;

    

    $associations = Association::get();
    $areas = Area::get();
    $branches = Branch::get()->where('area_id',$branch_user->area_id);
    //return $branch_user;

    #Edit Validation
      
      // if ($role <=2) {
        
      // }elseif($role ==3){
      //   if ($branch_user->user_type_id < $role) {
      //     return back()->with([
      //       'error' => __('admin.common.error'),
      //       'alert-type' => 'error'
      //     ]);
      //   }
      // }else{
      //   if ($branch_user->user_type_id < $role) {
      //     return back()->with([
      //       'error' => __('admin.common.error'),
      //       'alert-type' => 'error'
      //     ]);
      //   }
      // }
    #Edit Validation
    
    return view(self::VIEW_PATH . 'add_edit', compact('branch_user','user_types','roles','associations','areas','branches'));
  }

  public function update(Request $request, $id)
  {
    //$this->authorize('update',BranchUser::class);
    
    $this->validate($request, [
      'thumb' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:20000',
      //'thumb' => 'required',
      'status' => 'required',
      //'name' => 'required|min:1|max:128',
      'title_en' => 'required|min:1|max:128',
      'title_bn' => 'required|min:1|max:128',
      'username' => ['required', Rule::unique('admins')->ignore($id)],
      'email' => ['required', Rule::unique('admins')->ignore($id)],
      //'password' => 'required|confirmed|min:6',
      'area_id' => 'required',
      'branch_id' => 'required',
    ]);
    //dd($request->all());

    $authUser = Auth::guard('admin')->user()->load(['userType']);
    if (BranchUser::DEFAULT_ROLE_LIST[1] != $authUser->userType->default_role) {
      if ($request->user_type_id <= BranchUser::DEFAULT_ROLE_LIST[8]) {
        return back()->with([
          'error' => __('admin.common.error'),
          'alert-type' => 'error'
        ]);
      }
    }


    try {

      $branch_user = BranchUser::where(['id'=>$id])->first();
      if ( is_null($branch_user) == true) {
        return back()->with([
          'error' => __('admin.common.error'),
          'alert-type' => 'error'
        ]);
      }
      $data = $request->except('_token');
      
      $authAdmin = Auth::guard('admin')->user()->id;
  
      array_walk_recursive($data, function (&$val) {
          $val = trim($val);
          $val = is_string($val) && $val === '' ? null : $val;
      });
  
      $data['updated_by'] = $authAdmin;
  
      if ($request->hasFile('thumb')) {
        @unlink(storage_path('/app/public/' . $branch_user->thumb));
        $thumb = $request->file('thumb');
        $randNumber = rand(1, 999);
        $name = 'thumb-' . $authAdmin . '-' . time() . $randNumber . '.' . $thumb->getClientOriginalExtension();
        $year = date('Y/');
        $month = date('F/');
        $destinationPath = storage_path('app/public/branch_user/' . $year . $month);
        $thumb->move($destinationPath, $name);
        $filePath = 'branch_user/' . $year . $month;
        $data['thumb'] = $filePath . '' . $name;
      }
  
      if ($authAdmin == $id) {
        $data['status'] = true;
      }
  
      BranchUser::find($id)->update($data);
      Cache::forget('locWiseAuthUserInfo');
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }


    return redirect()->route('admin.branch_user')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);

  }

  public function delete(Request $request,$id,$sid=0)
  {
    //$this->authorize('delete',BranchUser::class);

    $branch_user = BranchUser::find($id);
    if ( is_null($branch_user) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    $authAdmin = Auth::guard('admin')->user()->id;

    if ($id == $authAdmin) {
      return back()->with([
        'error' => __('admin.common.error'),
        //'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }

    try {
      if ($sid==false) {
        $branch_user->status = false;
        $branch_user->save();
      } else {
        @unlink(storage_path('/app/public/' . $branch_user->thumb));
        $branch_user->delete();
      }
      Cache::forget('locWiseAuthUserInfo');
      
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    return redirect()->route('admin.branch_user')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }
}
