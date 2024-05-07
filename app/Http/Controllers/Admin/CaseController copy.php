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

class CaseController extends Controller
{
  const VIEW_PATH = 'admin.case.';
  public function __construct()
  {

  }

  public function index($cid= 0 )
  {

    $this->authorize('read',Application::class);
    $totalApplication = Application::count();
    $caseTypesWithCount = CaseType::withCount('applications')
        ->orderBy('title_' . app()->getLocale())
        ->get();



    if ($cid != 0  )
    {
        $applications = Application::with('step','stepdate','file','suspect','division','district','upazila','thana','caseType','caseCategory','guardianType', 'caseStatus')
            ->where('case_type_id', $cid)
            ->orderBy('id','desc')->utwd()->paginate(50);
    }
    else
    {
        $applications = Application::with('step','stepdate','file','suspect','division','district','upazila','thana','caseType','caseCategory','guardianType', 'caseStatus')
            ->orderBy('id','desc')->utwd()->paginate(50);

    }

    //    dd($applications);

    return view(self::VIEW_PATH . 'index',compact('applications','caseTypesWithCount','totalApplication'));
  }

//    public function showTypeBaseCases(Request $request, $typeId)
//    {
//        $this->authorize('read',Application::class);
//        $totalApplication = Application::count();
//        $applications = Application::with('step','stepdate','file','suspect','division','district','upazila','thana','caseType','caseCategory','guardianType', 'caseStatus')
//            ->where('id', $typeId)
//            ->orderBy('id','desc')->utwd()->paginate(100);
//
//        $caseTypesWithCount = CaseType::withCount('applications')
//            ->orderBy('title_' . app()->getLocale())
//            ->get();
//        return view(self::VIEW_PATH . 'index',compact('applications','caseTypesWithCount','totalApplication'));
//    }

  public function create()
  {
    $this->authorize('create',App\Applicationn::class);

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
    $this->authorize('create',App\Applicationn::class);
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

    return redirect()->route('admin.case')->with([
                    'message' => __('admin.common.success'),
                    'alert-type' => 'success'
                ]);
  }

  public function edit(Request $request, $id)
  {
    $this->authorize('update',App\Applicationn::class);
    $application = Application::with('step','stepdate','file','suspect','division','district','upazila','thana','caseType','caseCategory','guardianType', 'caseStatus')->where(['id'=>$id])->first();
    if ( is_null($application) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    // $associations = Association::get();
    // $areas = Area::utwd()->get();
    // $branches = Branch::utwd()->get();
    // $office_types = OfficeType::get();

    // $categories = Category::get();
    // $services = Service::get();
    // $users = User::get();


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
    $this->authorize('update',App\Applicationn::class);
    //dd($request->file());
    //dd($request->all());
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
    return redirect()->route('admin.case')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  public function delete(Request $request, $id, $sid = 0)
  {
    $this->authorize('delete',App\Application::class);
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

    return redirect()->route('admin.case')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  public function delete_file(Request $request, $id, $sid = 0)
  {
    $this->authorize('delete_single_file',App\Application::class);
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
    $this->authorize('edit_suspicious_info',App\Applicationn::class);
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
    $this->authorize('update_suspicious_info',App\Application::class);

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
    return redirect()->route('admin.case')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);

  }

  public function delete_suspicious_info(Request $request, $id, $sid = 0)
  {
    $this->authorize('delete_suspicious_info',App\Application::class);
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
    $this->authorize('edit_step_info',App\Applicationn::class);
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

    $case_statuses = CaseStatus::get();
    $risks = Risk::get();

    $divisions = Division::get();
    $districts = District::where('division_id',$application->division_id)->get();
    $upazilas = Upazila::where('district_id',$application->district_id)->get();
    $thanas = Thana::where('district_id',$application->district_id)->get();



    //dd( count($application->file));
    //dd($application);

    return view(self::VIEW_PATH . 'step_edit', compact('application','divisions','districts','upazilas','thanas','case_categories','case_types','guardian_types','case_statuses','risks'));
  }

  public function update_step_info(Request $request, $id)
  {
    $this->authorize('update_step_info',App\Application::class);

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

      $application->case_status_id = $data['case_status_id'];
      $application->risk_id = $data['risk_id'];
      $application->step_date = $data['step_date'];
      $application->save();

      //Files Area
      foreach ($request['arraydata'] as $key => $arraydata) {
        //dd($arraydata);
        if (@$arraydata['id']) {
          $id = $arraydata['id'];
          $arraydata['updated_by'] = $authUser;
          Step::find($id)->update($arraydata);
        } else {
          $arraydata['application_id'] = $application->id;
          $arraydata['created_by'] = $authUser;
          $arraydata['title_en'] = @$arraydata['title_en'];
          $arraydata['title_bn'] = @$arraydata['title_bn'];
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
    return redirect()->route('admin.case')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);

  }

  public function delete_step_info(Request $request, $id, $sid = 0)
  {
    $this->authorize('delete_step_info',App\Application::class);
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
    $this->authorize('edit_addmember_info',App\Applicationn::class);
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

    $case_statuses = CaseStatus::get();
    $risks = Risk::get();

    $divisions = Division::get();
    $districts = District::get();
    $upazilas = Upazila::get();
    $thanas = Thana::get();

    //$walkings = Admin::where('user_type_id',Admin::WalkingGroup)->get();
    $walkings = Admin::get();


    //dd( count($application->file));
    //dd($application);

    return view(self::VIEW_PATH . 'addmember_edit', compact('application','divisions','districts','upazilas','thanas','case_categories','case_types','guardian_types','case_statuses','risks','walkings'));
  }

  public function update_addmember_info(Request $request, $id)
  {
    $this->authorize('update_addmember_info',App\Application::class);

    dd($request->all());

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

      $application->districts = (@$data['districts']) ? json_encode(@$data['districts']) : NULL ;
      $application->upazilas = (@$data['upazilas']) ? json_encode(@$data['upazilas']) : NULL ;
      $application->wusers = (@$data['wusers']) ? json_encode(@$data['wusers']) : NULL ;
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
    return redirect()->route('admin.case')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);

  }

  public function delete_addmember_info(Request $request, $id, $sid = 0)
  {
    $this->authorize('delete_addmember_info',App\Application::class);
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

  public function show(Request $request, $id)
  {
    $this->authorize('show',App\Applicationn::class);
    $application = Application::with('step','stepdate','file','suspect','division','district','upazila','thana','caseType','caseCategory','guardianType', 'caseStatus')->where(['id'=>$id])->first();
    if ( is_null($application) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    //dd($application);

    // $associations = Association::get();
    // $areas = Area::utwd()->get();
    // $branches = Branch::utwd()->get();
    // $office_types = OfficeType::get();

    // $categories = Category::get();
    // $services = Service::get();
    // $users = User::get();


    $case_categories = CaseCategory::get();
    $case_types = CaseType::get();
    $guardian_types = GuardianType::get();

    $divisions = Division::get();
    $districts = District::where('division_id',$application->division_id)->get();
    $upazilas = Upazila::where('district_id',$application->district_id)->get();
    $thanas = Thana::where('district_id',$application->district_id)->get();


    return view(self::VIEW_PATH . 'show', compact('application','divisions','districts','upazilas','thanas','case_categories','case_types','guardian_types'));
  }






}
