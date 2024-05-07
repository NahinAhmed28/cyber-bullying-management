<?php
namespace App\Http\Controllers\Guest;

use App;
use App\Caseongoing;
use App\Models\Area;
use App\Models\Unit;
use App\Models\User;
use App\Models\Admin;
use App\Models\Thana;

use App\Models\Branch;
use App\Models\Nursery;
use App\Models\Product;
use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;
use App\Models\BranchUnit;
use App\Models\Application;
use App\Models\Association;
use Illuminate\Http\Request;
use App\Models\ServiceDetail;
use App\Models\TrackingDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AjaxController extends Controller
{
    public function __construct()
    {

    }
    public function case_status_change($appication_id, $case_status_id)
    {
        $authUser = Auth::guard('admin')->user()->load(['userType']);
        if($authUser->userType->default_role > Admin::DEFAULT_ROLE_LIST[4]){
            return $data['result'] = false;
        }

        $authUser = Auth::guard('admin')->user()->id;
        $application = Application::where(['id'=>$appication_id])->first();
        
        $application->case_status_id = $case_status_id;
        $application->updated_by = $authUser;
        $application->save();
        //(app()->getLocale() == 'en') ?
        $data['result'] = (app()->getLocale() == 'en') ? "Request has been successfully updated" : "অনুরোধ সফলভাবে আপডেট করা হয়েছে";

        // return redirect()->route('admin.caseongoing')->with([
        //     'message' => __('admin.common.success'),
        //     'alert-type' => 'success'
        //   ]);
        return \response()->json($data);
        
    }
    
    public function getDsitrict($id)
    {
        if($id){
            return $districts = District::where('division_id',$id)->get();
        }
        return [];
        
    }
    
    public function getArea($id)
    {
        if($id){
            return $associations = Area::where('association_id',$id)->get();
        }
        return [];
        
    }
    
    public function getUpazila($id)
    {
        if ($id) {
            return $upazilas = Upazila::where('district_id',$id)->get();
        }
        return [];
    }
    
    public function getThana($id)
    {
        if ($id) {
            return $thanas = Thana::where('district_id',$id)->get();
        }
        return [];
    }

    public function getUpazilaSelf($id = 0)
    {
        if ($id) {
            return $upazila = Upazila::where('id',$id)->get();
        }
        return [];
    }
    
    // public function getProduct($id = 0)
    // {
    //     if ($id > 0) {
    //         return $products = Product::with('size','color','age','unit','category')->where('id',$id)->get();
    //     }
    //     return [];
    // }
    
    // public function getProducts($id = 0)
    // {
    //     if ($id > 0) {
    //         return $products = Product::with('size','color','age','unit','category')->where('category_id',$id)->get();
    //     }
    //     return [];
    // }
    
    // public function getUnit($id = 0)
    // {
    //     if ($id) {
    //         return $products = Unit::where('id',$id)->get();
    //     }
    //     return [];
    // }
    
    
    
    // public function getNursery($id = 0)
    // {
    //     if ($id) {
    //         $nursery = Nursery::find($id);
    //         $division_id = $nursery->division_id;

    //         return $division = Division::find($division_id);
    //     }

    //     return \response()->json(null);
    // }
    
    // public function getNursery1($id = 0)
    // {
    //     if ($id) {
    //         return $nurseries = Nursery::where(['upazila_id'=>$id])->get();
    //     }

    //     return [];
    // }

        
    // public function getPresident($id)
    // {
    //     if($id){
    //         $branch = Branch::find($id);
    //         return $presidents = Admin::where('area_id',$branch->area_id)->where(['user_type_id'=>Admin::P])->get();
    //     }
    //     return [];
        
    // }
    
    // public function getVicePresident($id)
    // {
    //     if($id){
    //         return $branch_units = Admin::where('branch_id',$id)->where(['user_type_id'=>Admin::VP])->get();
    //     }
    //     return [];
        
    // }
    
    // public function getCaliph($id)
    // {
    //     if($id){
    //         return $branch_units = Admin::where('branch_id',$id)->where(['user_type_id'=>Admin::CA])->get();
    //     }
    //     return [];
        
    // }
    
    // public function getBranchUnit($id)
    // {
    //     if($id){
    //         return $branch_units = BranchUnit::where('branch_id',$id)->get();
    //     }
    //     return [];
        
    // }
    
    // public function getDivision($id)
    // {
    //     if($id){
    //         return $divisions = Division::where('state_id',$id)->get();
    //     }
    //     return [];
        
    // }

    // public function getBranchByArea($id)
    // {
    //     $authUser = Auth::guard('admin')->user()->load(['userType']);
    //     if($id){
    //         return $branches = Branch::where('area_id',$id)->get();
    //     }
    //     return [];
        
    // }
    
    // public function getUsers()
    // {
    //     $query = User::get();
    //     return $users = json_decode(json_encode($query), True);
    //     //return \response()->json($users);
    // }
    
}