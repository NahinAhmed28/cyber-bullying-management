<?php

namespace App\Http\Controllers\Admin;
use App\Models\Area;
use App\Models\Role;
use App\Models\Admin;
use App\Models\Thana;
use App\Models\Branch;
use App\Models\Status;


use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;
use App\Models\UserType;
use Barryvdh\DomPDF\PDF;
use App\Models\Association;
use App\Models\Designation;

use Illuminate\Support\Str;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\DistrictCommittee;
use App\Models\OfficeDesignation;
use Illuminate\Support\Facades\DB;
use App\Helper\EnglishToBanglaDate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;

class DistrictCommitteeController extends Controller
{
  
  const VIEW_PATH = 'admin.district_committee.';
  public function __construct()
  {
  }

  public function index(Request $request)
  {
    //dd($request->all());
    $admins = DistrictCommittee::with('role','userType','association','area','branch')->utwd()->orderBy('id','desc')->paginate(100);
    return view(self::VIEW_PATH . 'index',compact('admins'));
  }

  public function create()
  {
    //$this->authorize('create',DistrictCommittee::class);
    
    $user_types = UserType::utwd()->where(['id'=>Admin::DistrictCommittee])->get();
    $roles = Role::utwd()->where(['id'=>Admin::DistrictCommittee])->get();


    $divisions = Division::get();
    $districts = District::get();
    $upazilas = Upazila::get();
    $thanas = Thana::get();

    $areas = Area::get();
    $branches = Branch::get();
    $designations = Designation::get();
    $office_designations = OfficeDesignation::get();
    return view(self::VIEW_PATH . 'add_edit', compact('user_types','roles','areas','branches','divisions','districts','upazilas','thanas','designations','office_designations'));
  }

  public function store(Request $request)
  {
    
    //$this->authorize('create',DistrictCommittee::class);
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
    ]);


    $authUser = Auth::guard('admin')->user()->load(['userType']);
    if (Admin::DEFAULT_ROLE_LIST[1] != $authUser->userType->default_role) {
      if ($request->user_type == Admin::DEFAULT_ROLE_LIST[1]) {
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

      $admin = DB::table('admins')->orderBy('id','DESC')->first();

      if ($admin) {
        $data['code'] = $admin->code + 1;
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
        $destinationPath = storage_path('app/public/admin/' . $year . $month);
        $thumb->move($destinationPath, $name);
        $filePath = 'admin/' . $year . $month;
        $data['thumb'] = $filePath . '' . $name;
      }
      if ($request->hasFile('dsign')) {
        $dsign = $request->file('dsign');
        $randNumber = rand(1, 999);
        $name = 'dsign-' . $authAdmin . '-' . time() . $randNumber . '.' . $dsign->getClientOriginalExtension();
        $year = date('Y/');
        $month = date('F/');
        $destinationPath = storage_path('app/public/admin/' . $year . $month);
        $dsign->move($destinationPath, $name);
        $filePath = 'admin/' . $year . $month;
        $data['dsign'] = $filePath . '' . $name;
      }

      //$data['username'] = $data['email'];


      DistrictCommittee::create($data);
      Cache::forget('locWiseAuthUserInfo');
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }

    return redirect()->route('admin.central_committee')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  public function edit(Request $request, $id)
  {



    //$this->authorize('update',DistrictCommittee::class);
    $admin = DB::table('admins')->where(['id'=>$id])->first();
    $user_types = UserType::utwd()->where(['id'=>Admin::DistrictCommittee])->get();
    $roles = Role::utwd()->where(['id'=>Admin::DistrictCommittee])->get();

    $authUser = Auth::guard('admin')->user()->load(['userType']);
    $role = $authUser->userType->default_role;

    

    $divisions = Division::get();
    $districts = District::where('division_id',$admin->division_id)->get();
    $upazilas = Upazila::where('district_id',$admin->district_id)->get();
    $thanas = Thana::where('district_id',$admin->district_id)->get();


    $associations = Association::get();
    $areas = Area::get()->where('association_id',$admin->association_id);
    $branches = Branch::get()->where('area_id',$admin->area_id);
    //return $admin;

    $designations = Designation::get();
    $office_designations = OfficeDesignation::get();

    #Edit Validation
      
      if ($role <=2) {
        
      }elseif($role ==3){
        if ($admin->user_type_id < $role) {
          return back()->with([
            'error' => __('admin.common.error'),
            'alert-type' => 'error'
          ]);
        }
      }else{
        if ($admin->user_type_id < $role) {
          return back()->with([
            'error' => __('admin.common.error'),
            'alert-type' => 'error'
          ]);
        }
      }
    #Edit Validation
    
    return view(self::VIEW_PATH . 'add_edit', compact('admin','user_types','roles','associations','areas','branches','divisions','districts','upazilas','thanas','designations','office_designations'));
  }

  public function update(Request $request, $id)
  {
    //$this->authorize('update',DistrictCommittee::class);
    
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
    ]);
    //dd($request->all());

    $authUser = Auth::guard('admin')->user()->load(['userType']);
    if (Admin::DEFAULT_ROLE_LIST[1] != $authUser->userType->default_role) {
      if ($request->user_type == Admin::DEFAULT_ROLE_LIST[1]) {
        return back()->with([
          'error' => __('admin.common.error'),
          'alert-type' => 'error'
        ]);
      }
    }


    try {

      $admin = DistrictCommittee::where(['id'=>$id])->first();
      if ( is_null($admin) == true) {
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
        @unlink(storage_path('/app/public/' . $admin->thumb));
        $thumb = $request->file('thumb');
        $randNumber = rand(1, 999);
        $name = 'thumb-' . $authAdmin . '-' . time() . $randNumber . '.' . $thumb->getClientOriginalExtension();
        $year = date('Y/');
        $month = date('F/');
        $destinationPath = storage_path('app/public/admin/' . $year . $month);
        $thumb->move($destinationPath, $name);
        $filePath = 'admin/' . $year . $month;
        $data['thumb'] = $filePath . '' . $name;
      }
      if ($request->hasFile('dsign')) {
        @unlink(storage_path('/app/public/' . $admin->dsign));
        $dsign = $request->file('dsign');
        $randNumber = rand(1, 999);
        $name = 'dsign-' . $authAdmin . '-' . time() . $randNumber . '.' . $dsign->getClientOriginalExtension();
        $year = date('Y/');
        $month = date('F/');
        $destinationPath = storage_path('app/public/admin/' . $year . $month);
        $dsign->move($destinationPath, $name);
        $filePath = 'admin/' . $year . $month;
        $data['dsign'] = $filePath . '' . $name;
      }
  
      if ($authAdmin == $id) {
        $data['status'] = true;
      }
  
      DistrictCommittee::find($id)->update($data);
      Cache::forget('locWiseAuthUserInfo');
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }


    return redirect()->route('admin.central_committee')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);

  }

  public function delete(Request $request,$id,$sid=0)
  {
    //$this->authorize('delete',DistrictCommittee::class);

    $admin = DistrictCommittee::find($id);
    if ( is_null($admin) == true) {
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
        $admin->status = false;
        $admin->save();
      } else {
        @unlink(storage_path('/app/public/' . $admin->thumb)); 
        @unlink(storage_path('/app/public/' . $admin->dsign)); 
        $admin->delete();
      }
      Cache::forget('locWiseAuthUserInfo');
      
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    return back()->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  
  public function export() 
  {
    return "Hello";
  }

  public function pdf() {
    // retreive all records from db
    //$data = Employee::all();

    $admins = DistrictCommittee::all();

    // share data to view
    //view()->share('employee',$data);
    $pdf = PDF::loadView(self::VIEW_PATH . 'pdf', compact('admins'))->setOptions(['defaultFont' => 'sans-serif']);

    // download PDF file with download method
    return $pdf->download('pdf_file.pdf');
  }


}
