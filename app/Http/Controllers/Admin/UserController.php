<?php

namespace App\Http\Controllers\Admin;
use App\Models\Area;
use App\Models\User;
use App\Models\Admin;
use App\Models\Color;
use App\Models\Thana;
use App\Models\Branch;
use App\Models\Status;

use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;
use Barryvdh\DomPDF\PDF;
use App\Models\Condition;
use App\Models\BranchUnit;
use App\Models\Association;
use Illuminate\Support\Str;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Stichoza\GoogleTranslate\GoogleTranslate;


class UserController extends Controller
{
  const VIEW_PATH = 'admin.user.';
  public function __construct()
  {

  }

  public function index(Request $request)
  {
    //$str = "মোঃ সানাউল্লাহ";
    //$tr =  GoogleTranslate::trans($str,'en');
    //dd($tr);
    $parameters = [];
    @$code = Session::get('code');
    @$contact = Session::get('contact');
    @$page = Session::get('page');
    if (($code || $contact) && $page == 'user') {
      $parameters['code'] = $code;
      $parameters['contact'] = $contact;
      # code...
      $users = User::with('caliph','president','vicePresident','branch','branchUnit','division','district','upazila','thana')
      ->whereRaw(($code) ? 'code = '. '"'. $code .'"' :  'code IS NOT NULL')
      ->whereRaw(($contact) ? 'contact = '. '"'. $contact .'"' :  'contact IS NOT NULL')
      ->orderBy('id','desc')
      ->paginate(100);
      //->toSql();
      //dd($users);
    } else {
      # code...
      $users = User::with('caliph','president','vicePresident','branch','branchUnit','division','district','upazila','thana')->orderBy('id','desc')->paginate(100);
    }
    
    //dd($users);
    return view(self::VIEW_PATH . 'index',compact('users','parameters'));
  }

  public function search(Request $request)
  {
    $this->authorize('search',User::class);
    
    // $this->validate($request, [
    //   'code' => 'required'
    // ]);
    $page = 'user';
    Session::forget(['page','code','contact']);
    Session::put(['code'=>$request->code, 'contact'=>$request->contact,  'page'=>$page]);
    //dd(Session::all());
    return redirect()->route('admin.user');

  }

  public function datatable(Request $request)
  {
    if ($request->ajax()) {
      $authUser = Auth::guard('admin')->user();
      $users = User::latest()->take(100)->get();
      return DataTables::of($users)
      ->addIndexColumn()
      ->editColumn('created_at', function (User $user) use ($authUser) {
        return date('d-m-Y', strtotime($user->created_at));
      })
      ->editColumn('status', function (User $user) use ($authUser) {
        return __('admin.status.'.Status::LIST[$user->status]);
      })
      ->addColumn('thumb', function (User $user) use ($authUser) {
          if (!empty($user->thumb)) {
              return "<a style=\"margin-left: 30%;\" target=\"_blank\" href='".asset('storage/'.$user->thumb)."'><i class=\"fa fa-eye fa-2x\" aria-hidden=\"true\"></i></a>";
          }else{
              return "<a style=\"margin-left: 30%;\"><i class=\"fa fa-eye-slash fa-2x\" aria-hidden=\"true\"></i> </a>";
          }
      })
      ->addColumn('action', function (User $user) use ($authUser) {
        $str = '<div>';
        $str .= '<a href="'.route('admin.user.edit', $user->id) .'" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a>';
        $str .= '<a href="'.route('admin.user.delete', $user->id) .'" class="delete btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i></a>';
        $str .= '</div>';
        return $str;
      })
      ->rawColumns(['thumb','action'])
      ->make(true);
    }
    
  }

  public function view(Request $request, $id)
  {
    $this->authorize('view',User::class);
    
    //Need
    $user = User::with('caliph','president','vicePresident','branch','branchUnit','division','district','upazila','thana')->where(['id'=>$id])->first();
    //$conditions_arr = json_decode($user->conditions);
    //$colors_arr = json_decode($user->colors);

    if($user->conditions){
      $conditions_arr = json_decode($user->conditions);
    }else{
      $conditions_arr = [];
    }

    if($user->colors){
      $colors_arr = json_decode($user->colors);
    }else{
      $colors_arr = [];
    }

    $colors_data = Color::get()->whereIn('id',$colors_arr);
    $conditions_data = Condition::get()->whereIn('id',$conditions_arr);
    //Need

    //dd($user, $colors_data, $conditions_data);

    // No Need
    $associations = Association::get();
    $areas = Area::get();
    $branches = Branch::get();
    $branch_units = BranchUnit::get();
    $presidents = Admin::get()->where('user_type_id',Admin::P);
    $vice_presidents = Admin::get()->where('user_type_id',Admin::VP);
    $caliphs = Admin::get()->where('user_type_id',Admin::CA);
    $conditions = Condition::get();
    $colors = Color::get();
    $divisions = Division::get();
    $districts = District::where('division_id',$user->division_id)->get();
    $upazilas = Upazila::where('district_id',$user->district_id)->get();
    $thanas = Thana::where('district_id',$user->district_id)->get();
    // No Need
    //dd($user);
    return view(self::VIEW_PATH . 'view', compact('associations','areas','branches','branch_units','caliphs','vice_presidents','presidents','conditions','divisions','districts','upazilas','thanas','colors','user','colors_arr','conditions_arr','colors_data','colors_data') );
  }

  public function print(Request $request, $id)
  {
    $this->authorize('view',User::class);
    
    //Need
    $user = User::with('caliph','president','vicePresident','branch','branchUnit','division','district','upazila','thana')->where(['id'=>$id])->first();
    //$conditions_arr = json_decode($user->conditions);
    //$colors_arr = json_decode($user->colors);

    if($user->conditions){
      $conditions_arr = json_decode($user->conditions);
    }else{
      $conditions_arr = [];
    }

    if($user->colors){
      $colors_arr = json_decode($user->colors);
    }else{
      $colors_arr = [];
    }


    $colors_data = Color::get()->whereIn('id',$colors_arr);
    $conditions_data = Condition::get()->whereIn('id',$conditions_arr);
    //Need

    //dd($user, $colors_data, $conditions_data);

    // No Need
    $associations = Association::get();
    $areas = Area::get();
    $branches = Branch::get();
    $branch_units = BranchUnit::get();
    $presidents = Admin::get()->where('user_type_id',Admin::P);
    $vice_presidents = Admin::get()->where('user_type_id',Admin::VP);
    $caliphs = Admin::get()->where('user_type_id',Admin::CA);
    $conditions = Condition::get();
    $colors = Color::get();
    $divisions = Division::get();
    $districts = District::where('division_id',$user->division_id)->get();
    $upazilas = Upazila::where('district_id',$user->district_id)->get();
    $thanas = Thana::where('district_id',$user->district_id)->get();
    // No Need
    //dd($user);
    return view(self::VIEW_PATH . 'print', compact('associations','areas','branches','branch_units','caliphs','vice_presidents','presidents','conditions','divisions','districts','upazilas','thanas','colors','user','colors_arr','conditions_arr','colors_data','colors_data') );
  }

  public function create()
  {
    //$this->authorize('create',User::class);

    $associations = Association::get();
    $areas = Area::get();
    
    $branches = Branch::get();
    $branch_units = BranchUnit::get();

    $presidents = Admin::get()->where('user_type_id',Admin::P);
    $vice_presidents = Admin::get()->where('user_type_id',Admin::VP);
    $caliphs = Admin::get()->where('user_type_id',Admin::CA);
    $conditions = Condition::get();
    $colors = Color::get();

    $divisions = Division::get();
    $districts = District::get();
    $upazilas = Upazila::get();
    $thanas = Thana::get();

    $conditions_arr = [];
    $colors_arr = [];
    
    return view(self::VIEW_PATH . 'add_edit',compact('associations','areas','branches','branch_units','caliphs','vice_presidents','presidents','conditions','divisions','districts','upazilas','thanas','colors','conditions_arr','colors_arr') );
  }

  public function store(Request $request)
  {
    //$this->authorize('create',User::class);
    $this->validate($request, [
      'thumb' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:20000',
      //'thumb' => 'required',
      //'name' => 'required|min:1|max:128',
      //'username' => 'required|unique:users|min:1|max:128',
      //'email' => 'required|email|unique:users|min:1|max:128',
      //'password' => 'required|confirmed|min:6',
      'title_bn' => 'required',
      'division_id' => 'required',
      'district_id' => 'required',
      'upazila_id' => 'required',
      'thana_id' => 'required',
      'father_bn' => 'required',
      'contact' => 'required',

      'contact' => 'required|unique:users|min:1|max:13',
    ]);

    try {
      $data = $request->except('_token');
      $authUser = Auth::guard('admin')->user()->id;
      array_walk_recursive($data, function (&$val) {
          $val = trim($val);
          $val = is_string($val) && $val === '' ? null : $val;
      });

      $data['remember_token'] = Str::random(10);
      $data['email_verified_at'] = now();
      $data['created_by'] = $authUser;
      $data['email'] = $request->contact."@mas.com";
      $data['username'] = $request->contact;
      $data['password'] = Hash::make($request->contact);

      if ($request->hasFile('thumb')) {
        $thumb = $request->file('thumb');
        $randNumber = rand(1, 999);
        $name = 'thumb-' . $authUser . '-' . time() . $randNumber . '.' . $thumb->getClientOriginalExtension();
        $year = date('Y/');
        $month = date('F/');
        $destinationPath = storage_path('app/public/user/' . $year . $month);
        $thumb->move($destinationPath, $name);
        $filePath = 'user/' . $year . $month;
        $data['thumb'] = $filePath . '' . $name;
      }

      if (@$data['conditions']) {
        $data['conditions'] = json_encode($data['conditions']);
      }
      if (@$data['colors']) {
        $data['colors'] = json_encode($data['colors']);
      }
      //Languase
      //@$data['title_en'] = GoogleTranslate::trans($request->title_en,'en');
      //@$data['father_en'] = GoogleTranslate::trans($request->father_en,'en');
      //@$data['address_en'] = GoogleTranslate::trans($request->address_en,'en');
      $user = DB::table('users')->orderBy('id','DESC')->first();
      if ($user) {
        // Code
          $str = $user->code; $pos = strripos($str,"-"); $sn = substr($str,$pos+1);
          $branch = Branch::find($request->branch_id);
          $prefix = 'M';
          $data['code'] = $prefix.'-'. $branch->code .'-'. ( str_pad(($sn + 1), 6, '0', STR_PAD_LEFT));
        // Code
      } else {
        // Code
          $branch = Branch::find($request->branch_id);
          $prefix = 'M';
          $data['code'] = $prefix.'-'. $branch->code .'-'. str_pad(1, 6, '0', STR_PAD_LEFT);
        // Code
      }
      
      

      //Languase
      User::create($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }

    if ($request->where == 'admin.sale.create') {
      // return redirect()->route($request->where)->with([
      //   'message' => __('admin.common.success'),
      //   'alert-type' => 'success'
      // ]);

      return response()->json(['success'=>'Form is successfully submitted!']);
        
    } else {
      return redirect()->route('admin.user')->with([
        'message' => __('admin.common.success'),
        'alert-type' => 'success'
      ]);
    }
    

    
  }

  public function edit(Request $request, $id)
  {
    //$this->authorize('update',User::class);
    $user = User::where(['id'=>$id])->first();
    
    $associations = Association::get();
    $areas = Area::get();
    
    $branches = Branch::get();
    $branch_units = BranchUnit::get();

    $presidents = Admin::get()->where('user_type_id',Admin::P);
    $vice_presidents = Admin::get()->where('user_type_id',Admin::VP);
    $caliphs = Admin::get()->where('user_type_id',Admin::CA);
    $conditions = Condition::get();
    $colors = Color::get();
    
    $divisions = Division::get();
    $districts = District::where('division_id',$user->division_id)->get();
    $upazilas = Upazila::where('district_id',$user->district_id)->get();
    $thanas = Thana::where('district_id',$user->district_id)->get();

    if($user->conditions){
      $conditions_arr = json_decode($user->conditions);
    }else{
      $conditions_arr = [];
    }

    if($user->colors){
      $colors_arr = json_decode($user->colors);
    }else{
      $colors_arr = [];
    }
    
    //$colors_data = Color::get()->whereIn('id',$colors_arr);
    //dd($conditions_arr, $colors_arr, $user);
    
    return view(self::VIEW_PATH . 'add_edit', compact('associations','areas','branches','branch_units','caliphs','vice_presidents','presidents','conditions','divisions','districts','upazilas','thanas','colors','user','colors_arr','conditions_arr') );
  }

  public function update(Request $request, $id)
  {
    //$this->authorize('update',User::class);
    
    $this->validate($request, [
      //'thumb' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:20000',
      //'thumb' => 'required',
      //'status' => 'required',
      //'name' => 'required|min:1|max:128',
      //'username' => 'required|unique:users|min:1|max:128',
      //'email' => 'required|email|unique:users|min:1|max:128',
      //'password' => 'required|confirmed|min:6',

      'contact' => ['required', Rule::unique('users')->ignore($id)],
    ]);
    //dd($request->all());

    $user = User::where(['id'=>$id])->first();
    if ( is_null($user) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }
    

    try {
      $data = $request->except('_token');
      $authUser = Auth::guard('admin')->user()->id;
      array_walk_recursive($data, function (&$val) {
          $val = trim($val);
          $val = is_string($val) && $val === '' ? null : $val;
      });

      $data['updated_by'] = $authUser;
      $data['email'] = $request->contact."@mas.com";
      $data['username'] = $request->contact;
      $data['password'] = Hash::make($request->contact);
      if ($request->hasFile('thumb')) {
        @unlink(storage_path('/app/public/' . $user->thumb));
        $thumb = $request->file('thumb');
        $randNumber = rand(1, 999);
        $name = 'thumb-' . $authUser . '-' . time() . $randNumber . '.' . $thumb->getClientOriginalExtension();
        $year = date('Y/');
        $month = date('F/');
        $destinationPath = storage_path('app/public/user/' . $year . $month);
        $thumb->move($destinationPath, $name);
        $filePath = 'user/' . $year . $month;
        $data['thumb'] = $filePath . '' . $name;
      }

      //$data['conditions'] = json_encode($data['conditions']);
      //$data['colors'] = json_encode($data['colors']);

      if (@$data['conditions']) {
        $data['conditions'] = json_encode($data['conditions']);
      }
      if (@$data['colors']) {
        $data['colors'] = json_encode($data['colors']);
      }

      //Languase
      //@$data['title_en'] = GoogleTranslate::trans($request->title_en,'en');
      //@$data['father_en'] = GoogleTranslate::trans($request->father_en,'en');
      //@$data['address_en'] = GoogleTranslate::trans($request->address_en,'en');

      // if (!$user->code) {
      //   // Code
      //     $branch = Branch::find($request->branch_id);
      //     $prefix = 'M';
      //     $data['code'] = $prefix.'-'. $branch->code .'-'. str_pad(1, 6, '0', STR_PAD_LEFT);
      //   // Code
      // }
      
      //Languase
      User::find($id)->update($data);
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }
    return redirect()->route('admin.user')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);

  }

  public function delete(Request $request, $id, $sid = 0)
  {
    //$this->authorize('delete',User::class);
    $user = User::find($id);
    if ( is_null($user) == true) {
      return back()->with([
        'error' => __('admin.common.error'),
        'alert-type' => 'error'
      ]);
    }

    try {
      if ($sid==false) {
        $user->status = false;
        $user->save();
      } else {
        @unlink(storage_path('/app/public/' . $user->thumb));
        $user->delete();
      }
    } catch (\Throwable $exception) {
      return back()->with([
        //'error' => __('admin.common.error'),
        'error' => $exception->getMessage(),
        'alert-type' => 'error'
      ]);
    }

    
    return redirect()->route('admin.user')->with([
      'message' => __('admin.common.success'),
      'alert-type' => 'success'
    ]);
  }

  
  public function export() 
  {
    return Excel::download(new UsersExport, 'users.xlsx');
  }

  public function pdf() {
    // retreive all records from db
    //$data = Employee::all();

    $users = User::all();

    // share data to view
    //view()->share('employee',$data);
    $pdf = PDF::loadView(self::VIEW_PATH . 'pdf', compact('users'))->setOptions(['defaultFont' => 'sans-serif']);

    // download PDF file with download method
    return $pdf->download('pdf_file.pdf');
  }


}
