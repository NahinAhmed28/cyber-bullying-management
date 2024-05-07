<?php

namespace App\Http\Controllers\Admin;
use App\Models\Area;
use App\Models\File;
use App\Models\User;

use App\Models\Admin;
use App\Models\Thana;
use App\Models\Branch;
use App\Models\Service;
use App\Models\Upazila;
use App\Models\Category;
use App\Models\District;
use App\Models\Division;
use App\Models\OfficeType;
use App\Models\Application;
use App\Models\Association;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CaseCategory;
use App\Models\CaseStatus;
use App\Models\CaseType;
use App\Models\GuardianType;
use App\Models\Risk;
use App\Models\Step;
use App\Models\Stepdate;
use App\Models\Suspect;
use Illuminate\Support\Facades\Auth;
use App\Models\Stepfeed;

class CaseincompleteController extends Controller
{
  const VIEW_PATH = 'admin.caseincomplete.';
  public function __construct()
  {

  }

  public function index($cid= 0 )
  {

    $this->authorize('read',Caseincomplete::class);
    $totalApplication = Application::where('case_status_id', Admin::Incomplete)->count();
    $caseTypesWithCount = CaseType::withCount('incompleteapplications')->get();



    if ($cid != 0  )
    {
        $applications = Application::with('step','stepdate','file','suspect','division','district','upazila','thana','caseType','caseCategory','guardianType', 'caseStatus')
            ->where('case_status_id', Admin::Incomplete)
            ->where('case_type_id', $cid)
            ->orderBy('id','desc')->utwd()->paginate(50);
    }
    else
    {
        $applications = Application::with('step','stepdate','file','suspect','division','district','upazila','thana','caseType','caseCategory','guardianType', 'caseStatus')
            ->where('case_status_id', Admin::Incomplete)
            ->orderBy('id','desc')->utwd()->paginate(50);

    }

    //    dd($applications);

    return view(self::VIEW_PATH . 'index',compact('applications','caseTypesWithCount','totalApplication'));
  }

  public function create()
  {
    $this->authorize('create',App\Caseincomplete::class);

    $divisions = Division::get();
    $districts = District::get();
    $upazilas = Upazila::get();
    $thanas = Thana::get();

    $case_categories = CaseCategory::get();
    $case_types = CaseType::get();
    $guardian_types = GuardianType::get();

    return view(self::VIEW_PATH . 'add_edit', compact('divisions','districts','upazilas','thanas','case_categories','case_types','guardian_types'));
  }

  public function store(Request $request)
  {
    $this->authorize('create',App\Caseincomplete::class);
    $this->validate($request, [
        //'name' => 'required|min:1|max:128',
        'title_en' => 'required|min:1|max:128',
        'title_bn' => 'required|min:1|max:128',
    ]);

    //dd($request->all());
    DB::beginTransaction();
    try {
      $application = DB::table('applications')->orderBy('id','DESC')->first();
      $data = $request->except('_token');
      $authUser = Auth::guard('admin')->user()->id;
      array_walk_recursive($data, function (&$val) {
          $val = trim($val);
          $val = is_string($val) && $val === '' ? null : $val;
      });

      $data['created_by'] = $authUser;

      if ($request->hasFile('dsign')) {
        //@unlink(storage_path('/app/public/' . $site_setting->dsign));
        $dsign = $request->file('dsign');
        $randNumber = rand(1, 999);
        $name = 'dsign-' . $authUser . '-' . time() . $randNumber . '.' . $dsign->getClientOriginalExtension();
        $year = date('Y/');
        $month = date('F/');
        $destinationPath = storage_path('app/public/application/' . $year . $month);
        $dsign->move($destinationPath, $name);
        $filePath = 'application/' . $year . $month;
        $data['dsign'] = $filePath . '' . $name;
      }

      if ($application) {
        $data['code'] = $application->code + 1;
      } else {
        $data['code'] = 1;
      }

      //userlist
      $district = [$data['district_id']];
      $data['districts'] = json_encode($district);
      $data['upazilas'] = NULL;
      $data['wusers'] = NULL;
      $users = self::get_users_with_district($data['district_id']);
      $data['users'] = (@$users) ? json_encode(@$users) : NULL ;
      //userlist

      $application = Application::create($data);

      //Files Area
      foreach ($request['arraydata'] as $key => $arraydata) {
        if (@$arraydata['thumb']) {
          //@unlink(storage_path('/app/public/' . $site_setting->thumb));
          $thumb = $arraydata['thumb'];
          $randNumber = rand(1, 999);
          $name = 'thumb-' . $authUser . '-' . time() . $randNumber . '.' . $thumb->getClientOriginalExtension();
          $year = date('Y/');
          $month = date('F/');
          $destinationPath = storage_path('app/public/file/' . $year . $month);
          $thumb->move($destinationPath, $name);
          $filePath = 'file/' . $year . $month;
          $filedata['thumb'] = $filePath . '' . $name;
          //$filedata['name'] = $arraydata['name'];
          $filedata['application_id'] = $application->id;
          $filedata['created_by'] = $authUser;

          $filedata['title_en'] = @$arraydata['title_en'];
          $filedata['title_bn'] = @$arraydata['title_bn'];
          File::create($filedata);
        }
      }
      //Files Area
      DB::commit();
    } catch (\Throwable $exception) {
      DB::rollback();
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }

    return redirect()->route('admin.caseincomplete')->with([
                    'message' => __('admin.common.success'),
                    'alert-type' => 'success'
                ]);
  }

  public function edit(Request $request, $id)
  {
    $this->authorize('update',App\Caseincomplete::class);
    $application = Application::with('step','stepdate','file','suspect','division','district','upazila','thana','caseType','caseCategory','guardianType', 'caseStatus')->where(['id'=>$id])->first();
    if ( is_null($application) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    $case_categories = CaseCategory::get();
    $case_types = CaseType::get();
    $guardian_types = GuardianType::get();

    $divisions = Division::get();
    $districts = District::where('division_id',$application->division_id)->get();
    $upazilas = Upazila::where('district_id',$application->district_id)->get();
    $thanas = Thana::where('district_id',$application->district_id)->get();



    //dd( count($application->file));
    //dd($application);

    return view(self::VIEW_PATH . 'add_edit', compact('application','divisions','districts','upazilas','thanas','case_categories','case_types','guardian_types'));
  }

  public function update(Request $request, $id)
  {
    $this->authorize('update',App\Caseincomplete::class);
    $this->validate($request, [
      //'name' => 'required|min:1|max:128',
      'title_en' => 'required|min:1|max:128',
      'title_bn' => 'required|min:1|max:128',
    ]);


    DB::beginTransaction();
    try {
      $application = Application::where(['id'=>$id])->first();
      if ( is_null($application) == true) {
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

      if ($application->district_id != $data['district_id']) {
        //userlist
        $district = [$data['district_id']];
        $data['districts'] = json_encode($district);
        $data['upazilas'] = NULL;
        $data['wusers'] = NULL;
        $users = self::get_users_with_district($data['district_id']);
        $data['users'] = (@$users) ? json_encode(@$users) : NULL ;
        //userlist
      }

      if ($request->hasFile('dsign')) {
        @unlink(storage_path('app/public/application/' . $application->dsign));
        $dsign = $request->file('dsign');
        $randNumber = rand(1, 999);
        $name = 'dsign-' . $authUser . '-' . time() . $randNumber . '.' . $dsign->getClientOriginalExtension();
        $year = date('Y/');
        $month = date('F/');
        $destinationPath = storage_path('app/public/application/' . $year . $month);
        $dsign->move($destinationPath, $name);
        $filePath = 'application/' . $year . $month;
        $data['dsign'] = $filePath . '' . $name;
      }
      Application::find($id)->update($data);

      //Files Area
      foreach ($request['arraydata'] as $key => $arraydata) {
        //dd($arraydata);
        if (@$arraydata['id']) {
          $id = $arraydata['id'];
          $filedata['title_en'] = @$arraydata['title_en'];
          $filedata['title_bn'] = @$arraydata['title_bn'];

          if (@$arraydata['thumb']) {
            //@unlink(storage_path('/app/public/' . $site_setting->thumb));
            $thumb = $arraydata['thumb'];
            $randNumber = rand(1, 999);
            $name = 'thumb-' . $authUser . '-' . time() . $randNumber . '.' . $thumb->getClientOriginalExtension();
            $year = date('Y/');
            $month = date('F/');
            $destinationPath = storage_path('app/public/file/' . $year . $month);
            $thumb->move($destinationPath, $name);
            $filePath = 'file/' . $year . $month;
            $filedata['thumb'] = $filePath . '' . $name;
          }
          File::find($id)->update($filedata);
        } else {
          if (@$arraydata['thumb']) {
            //@unlink(storage_path('/app/public/' . $site_setting->thumb));
            $thumb = $arraydata['thumb'];
            $randNumber = rand(1, 999);
            $name = 'thumb-' . $authUser . '-' . time() . $randNumber . '.' . $thumb->getClientOriginalExtension();
            $year = date('Y/');
            $month = date('F/');
            $destinationPath = storage_path('app/public/file/' . $year . $month);
            $thumb->move($destinationPath, $name);
            $filePath = 'file/' . $year . $month;
            $filedata['thumb'] = $filePath . '' . $name;
            //$filedata['name'] = $arraydata['name'];
            $filedata['application_id'] = $application->id;
            $filedata['created_by'] = $authUser;
  
            $filedata['title_en'] = @$arraydata['title_en'];
            $filedata['title_bn'] = @$arraydata['title_bn'];
            File::create($filedata);
          }
        }
        
      }
      //Files Area

      DB::commit();
    } catch (\Throwable $exception) {
      DB::rollback();
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    return redirect()->route('admin.caseincomplete')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  public function delete(Request $request, $id, $sid = 0)
  {    
    $this->authorize('delete',App\Caseincomplete::class);
    $application = Application::with('file')->find($id);
    if ( is_null($application) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    try {
      //$user = User::find($application->user_id);
      
      if ($sid==false) {
        $application->status = false;
        $application->save();
      } else {
        //$user->delete();
        if ( count($application->file) > 0 ) {
          foreach ($application->file as $key => $file) {
            @unlink(storage_path('app/public/' . $file->thumb));
          }
        }

        @unlink(storage_path('/app/public/' . $application->dsign));
        $application->delete();
      }
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    
    return redirect()->route('admin.caseincomplete')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  public function delete_file(Request $request, $id, $sid = 0)
  {   
    $this->authorize('delete_single_file',App\Caseincomplete::class);
    $file = File::find($id);
    if ( is_null($file) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }
    try {
      if ($sid==false) {
        @unlink(storage_path('/app/public/' . $file->thumb));
        $file->delete();
      } else {
        
        @unlink(storage_path('/app/public/' . $file->thumb));
        $file->delete();
      }
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
    
    return redirect()->route('admin.application.create')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  public function edit_suspicious_info(Request $request, $id)
  {
    $this->authorize('edit_suspicious_info',App\Caseincomplete::class);
    $application = Application::with('step','stepdate','file','suspect','division','district','upazila','thana','caseType','caseCategory','guardianType', 'caseStatus')->where(['id'=>$id])->first();
    if ( is_null($application) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    $case_categories = CaseCategory::get();
    $case_types = CaseType::get();
    $guardian_types = GuardianType::get();

    $divisions = Division::get();
    $districts = District::where('division_id',$application->division_id)->get();
    $upazilas = Upazila::where('district_id',$application->district_id)->get();
    $thanas = Thana::where('district_id',$application->district_id)->get();



    //dd( count($application->file));
    //dd($application);

    return view(self::VIEW_PATH . 'suspicious_edit', compact('application','divisions','districts','upazilas','thanas','case_categories','case_types','guardian_types'));
  }

  public function update_suspicious_info(Request $request, $id)
  {
    $this->authorize('update_suspicious_info',App\Caseincomplete::class);
    
    //dd($request->all());

    DB::beginTransaction();
    try {
      $application = Application::where(['id'=>$id])->first();
      if ( is_null($application) == true) {
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

      //Files Area
      foreach ($request['arraydata'] as $key => $arraydata) {
        //dd($arraydata);
        
        if (@$arraydata['id']) {
          $id = $arraydata['id'];
          $arraydata['updated_by'] = $authUser;

          if (@$arraydata['ssign']) {
            //@unlink(storage_path('/app/public/' . $site_setting->ssign));
            $ssign = $arraydata['ssign'];
            $randNumber = rand(1, 999);
            $name = 'ssign-' . $authUser . '-' . time() . $randNumber . '.' . $ssign->getClientOriginalExtension();
            $year = date('Y/');
            $month = date('F/');
            $destinationPath = storage_path('app/public/file/' . $year . $month);
            $ssign->move($destinationPath, $name);
            $filePath = 'file/' . $year . $month;
            $arraydata['ssign'] = $filePath . '' . $name;
          }

          Suspect::find($id)->update($arraydata);
        } else {
          if (@$arraydata['ssign']) {
            //@unlink(storage_path('/app/public/' . $site_setting->ssign));
            $ssign = $arraydata['ssign'];
            $randNumber = rand(1, 999);
            $name = 'ssign-' . $authUser . '-' . time() . $randNumber . '.' . $ssign->getClientOriginalExtension();
            $year = date('Y/');
            $month = date('F/');
            $destinationPath = storage_path('app/public/file/' . $year . $month);
            $ssign->move($destinationPath, $name);
            $filePath = 'file/' . $year . $month;
            $arraydata['ssign'] = $filePath . '' . $name;
            //$arraydata['name'] = $arraydata['name'];
            $arraydata['application_id'] = $application->id;
            $arraydata['created_by'] = $authUser;
  
            //$arraydata['title_en'] = @$arraydata['title_en'];
            //$arraydata['title_bn'] = @$arraydata['title_bn'];


            Suspect::create($arraydata);
          }
        }
        
      }
      //Files Area

      DB::commit();
    } catch (\Throwable $exception) {
      DB::rollback();
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

    return redirect()->route('admin.caseincomplete')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
    
  }

  public function delete_suspicious_info(Request $request, $id, $sid = 0)
  {   
    $this->authorize('delete_suspicious_info',App\Caseincomplete::class);
    $suspect = Suspect::find($id);
    if ( is_null($suspect) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }
    try {
      if ($sid==false) {
        @unlink(storage_path('/app/public/' . $suspect->ssign));
        $suspect->delete();
      } else {
        
        @unlink(storage_path('/app/public/' . $suspect->ssign));
        $suspect->delete();
      }
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
    
    return redirect()->route('admin.application.create')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  public function edit_step_info(Request $request, $id)
  {
    $this->authorize('edit_step_info',App\Caseincomplete::class);
    $application = Application::with( 'step','stepdate','file','suspect','division','district','upazila','thana','caseType','caseCategory','guardianType', 'caseStatus')->where(['id'=>$id])->first();
    if ( is_null($application) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    $case_categories = CaseCategory::get();
    $case_types = CaseType::get();
    $guardian_types = GuardianType::get();

    $case_statuses = CaseStatus::get();
    $risks = Risk::get();

    $divisions = Division::get();
    $districts = District::where('division_id',$application->division_id)->get();
    $upazilas = Upazila::where('district_id',$application->district_id)->get();
    $thanas = Thana::where('district_id',$application->district_id)->get();

    if ($application->users) {
      $admins = Admin::whereIn('id', json_decode($application->users))->get();
    } else {
      $admins = Admin::whereIn('id', [])->get();
    }

    //dd( count($application->file));
    //dd($admins);
    

    return view(self::VIEW_PATH . 'step_edit', compact('application','divisions','districts','upazilas','thanas','case_categories','case_types','guardian_types','case_statuses','risks','admins'));
  }

  public function update_step_info(Request $request, $id)
  {
    $this->authorize('update_step_info',App\Caseincomplete::class);
    
    //dd($request->all());
    DB::beginTransaction();
    try {
      $application = Application::where(['id'=>$id])->first();
      if ( is_null($application) == true) {
        return back()->with([
          'error' => __('admin.common.error'),
          'alert-type' => 'error'
        ]);
      }

      //Validation
      $users = self::array_flatten(json_decode($application->users));
      $authUser = Auth::guard('admin')->user()->load(['userType']);

        if($authUser->userType->default_role >= Admin::DEFAULT_ROLE_LIST[7]){
          if (!in_array($authUser->id, $users)){
            return back()->with([
              'error' => __('admin.common.error'),
              'alert-type' => 'error'
            ]);
          }
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[6]){
            if (!in_array($authUser->id, $users)){
              return back()->with([
                'error' => __('admin.common.error'),
                'alert-type' => 'error'
              ]);
            }
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[5]){
            if (!in_array($authUser->id, $users)){
              return back()->with([
                'error' => __('admin.common.error'),
                'alert-type' => 'error'
              ]);
            }
        } else{
          
        }
      //Validation


      $data = $request->except('_token');
      $authUser = Auth::guard('admin')->user()->id;
      array_walk_recursive($data, function (&$val) {
          $val = trim($val);
          $val = is_string($val) && $val === '' ? null : $val;
      });

      $application->case_status_id = $data['case_status_id'];
      $application->risk_id = $data['risk_id'];
      $application->step_date = $data['step_date'];
      $application->save();

      //Files Area
      foreach ($request['arraydata'] as $key => $arraydata) {
        //dd($arraydata);
        if (@$arraydata['id']) {
          $arraydata['admin_id'] = $arraydata['users'];
          $id = $arraydata['id'];
          $arraydata['updated_by'] = $authUser;
          Step::find($id)->update($arraydata);
        } else {
          $arraydata['application_id'] = $application->id;
          $arraydata['created_by'] = $authUser;
          $arraydata['title_en'] = @$arraydata['title_en'];
          $arraydata['title_bn'] = @$arraydata['title_bn'];
          $arraydata['admin_id'] = $arraydata['users'];
          Step::create($arraydata);
        }
      }
      //Files Area
      DB::commit();
    } catch (\Throwable $exception) {
      DB::rollback();
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

    return redirect()->route('admin.caseincomplete')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
    
  }

  public function delete_step_info(Request $request, $id, $sid = 0)
  {   
    $this->authorize('delete_step_info',App\Caseincomplete::class);
    $step = Step::find($id);
    if ( is_null($step) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }
    try {
      if ($sid==false) {
        $step->delete();
      } else {
        $step->delete();
      }
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
    
    return redirect()->route('admin.application.create')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }


  public function edit_addmember_info(Request $request, $id)
  {
    $this->authorize('edit_addmember_info',App\Caseincomplete::class);
    $application = Application::with( 'step','stepdate','file','suspect','division','district','upazila','thana','caseType','caseCategory','guardianType', 'caseStatus')->where(['id'=>$id])->first();
    if ( is_null($application) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    $case_categories = CaseCategory::get();
    $case_types = CaseType::get();
    $guardian_types = GuardianType::get();

    $case_statuses = CaseStatus::get();
    $risks = Risk::get();

    $divisions = Division::get();
    $districts = District::get();
    $upazilas = Upazila::get();
    $thanas = Thana::get();

    //$walkings = Admin::where('user_type_id',Admin::WalkingGroup)->get();
    $walkings = Admin::get();


    //dd( count($application->file));
    //$users = self::array_flatten(json_decode($application->users));
    //dd($users);

    return view(self::VIEW_PATH . 'addmember_edit', compact('application','divisions','districts','upazilas','thanas','case_categories','case_types','guardian_types','case_statuses','risks','walkings'));
  }

  public function update_addmember_info(Request $request, $id)
  {
    $this->authorize('update_addmember_info',App\Caseincomplete::class);
    
    //dd($request->all());

    DB::beginTransaction();
    try {

      $application = Application::where(['id'=>$id])->first();
      if ( is_null($application) == true) {
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

      $users = [];
      if(@$data['districts']){
        foreach($data['districts'] as $key=> $district_id){
          $users[] = self::get_users_with_district($district_id);
        }
      }

      if(@$data['upazilas']){
        foreach($data['upazilas'] as $key=> $upazila_id){
          $users[] = self::get_users_with_upazila($upazila_id);
        }
      }

      if(@$data['wusers']){
        $users[] = $data['wusers'];
      }

      $application->districts = (@$data['districts']) ? json_encode(@$data['districts']) : NULL ;
      $application->upazilas = (@$data['upazilas']) ? json_encode(@$data['upazilas']) : NULL ;
      $application->wusers = (@$data['wusers']) ? json_encode(@$data['wusers']) : NULL ;
      //$application->users = (@$users) ? json_encode(@$users) : NULL ;
      $application->users = (@$users) ? self::array_flatten(@$users) : NULL ;
      $application->save();
      //Files Area
      DB::commit();
    } catch (\Throwable $exception) {
      DB::rollback();
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
    return redirect()->route('admin.caseincomplete')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
    
  }

  public function delete_addmember_info(Request $request, $id, $sid = 0)
  {   
    $this->authorize('delete_addmember_info',App\Caseincomplete::class);
    $step = Step::find($id);
    if ( is_null($step) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }
    try {
      if ($sid==false) {
        $step->delete();
      } else {
        $step->delete();
      }
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
    
    return redirect()->route('admin.application.create')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  public function array_flatten($array) { 
    if (!is_array($array)) { 
      return FALSE; 
    } 
    $result = array(); 
    foreach ($array as $key => $value) { 
      if (is_array($value)) { 
        $result = array_merge($result, self::array_flatten($value)); 
      } 
      else { 
        $result[$key] = $value; 
      } 
    } 
    return array_map('intval', $result);
  }

  public function get_users_with_district($district_id)
  {
    $users = [];
    $admins = Admin::where(['district_id'=>$district_id, 'user_type_id' => Admin::DistrictCommittee])->select('id')->get();
    
    foreach($admins as $key=>$admin){
      $users[] = $admin->id;
    }
    return $users;
  }

  public function get_users_with_upazila($upazila_id)
  {
    $users = [];
    $admins = Admin::where(['upazila_id'=>$upazila_id, 'user_type_id' => Admin::UpazilaCommittee])->select('id')->get();
    foreach($admins as $key=>$admin){
      $users[] = $admin->id;
    }
    return $users;
  }


  public function show(Request $request, $id)
  {
    $this->authorize('show',App\Caseincomplete::class);
    $application = Application::with('step','stepdate','file','suspect','division','district','upazila','thana','caseType','caseCategory','guardianType', 'caseStatus')->where(['id'=>$id])->first();
    if ( is_null($application) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }
    $case_categories = CaseCategory::get();
    $case_types = CaseType::get();
    $guardian_types = GuardianType::get();

    $divisions = Division::get();
    $districts = District::where('division_id',$application->division_id)->get();
    $upazilas = Upazila::where('district_id',$application->district_id)->get();
    $thanas = Thana::where('district_id',$application->district_id)->get();


    $case_statuses = CaseStatus::whereIn('id', [Admin::Pending,Admin::Declined,Admin::Ongoing, Admin::Incomplete])->get();
    $risks = Risk::get();
    //$walkings = Admin::where('user_type_id',Admin::WalkingGroup)->get();
    $walkings = Admin::get();
    if ($application->users) {
      $admins = Admin::whereIn('id', json_decode($application->users))->get();
    } else {
      $admins = Admin::whereIn('id', [])->get();
    }
    


    $authUser = Auth::guard('admin')->user()->load(['userType']);

    $path = 'show';
    // if($authUser->userType->default_role >= Admin::DEFAULT_ROLE_LIST[5]){
    //   $path = 'show';
    // } else{
    //   $path = 'central_show';
    //   //$path = 'show';
    // }

    //dd($path);

    return view(self::VIEW_PATH . $path, compact('application','divisions','districts','upazilas','thanas','case_categories','case_types','guardian_types','case_statuses','risks','walkings','admins'));
  }

}
