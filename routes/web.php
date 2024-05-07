<?php

use App\Models\ActivityLog;
//use Spatie\Activitylog\Models\Activity;
use App\Helper\NumberToBanglaWord;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CaseController;
use App\Http\Controllers\Admin\LangController;
use App\Http\Controllers\Admin\RiskController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Guest\AjaxController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ThanaController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Site\SiteAllController;

use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UpazilaController;
use App\Http\Controllers\Admin\CaseTypeController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\UserTypeController;
use App\Http\Controllers\Guest\LanguageController;
use App\Http\Controllers\User\DashboardController;

use App\Http\Controllers\Admin\ConditionController;
use App\Http\Controllers\Admin\BranchUnitController;
use App\Http\Controllers\Admin\BranchUserController;

use App\Http\Controllers\Admin\CaseStatusController;
use App\Http\Controllers\Admin\OfficeTypeController;

use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\AssociationController;
use App\Http\Controllers\Admin\CaseongoingController;
use App\Http\Controllers\Admin\CasependingController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\ServiceTypeController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\CaseCategoryController;
use App\Http\Controllers\Admin\CasecompleteController;
use App\Http\Controllers\Admin\CasedeclinedController;
use App\Http\Controllers\Admin\GuardianTypeController;
use App\Http\Controllers\Admin\CaseincompleteController;
use App\Http\Controllers\Admin\CentralCommitteeController;
use App\Http\Controllers\Admin\UpazilaCommitteeController;
use App\Http\Controllers\Admin\DistrictCommitteeController;
use App\Http\Controllers\Admin\OfficeDesignationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Command Route For Development Server
Route::get('/key', function() {
    Artisan::call('key:generate');
});
Route::get('/cache', function() {
    Artisan::call('cache:clear');
});
Route::get('/optimize', function() {
    Artisan::call('optimize:clear');
});
Route::get('/link', function() {
    Artisan::call('storage:link');
});
Route::get('/view', function() {
    Artisan::call('view:clear');
});
Route::get('/route', function() {
    Artisan::call('route:clear');
});

Route::get('/command', function() {
    Artisan::call('key:generate');
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    //Artisan::call('storage:link');
    // Artisan::call('view:clear');
    // Artisan::call('route:clear');
});




//Guest Route
Route::get('lang/{lang}', ['as' => 'lang.switch',  LanguageController::class, 'switchLang'])->name('lang.switch');

Route::get('/division/{id?}', ['as'=>'get.division',AjaxController::class, 'getDivision'])->name('get.division');
Route::get('/district/{id?}', ['as'=>'get.district',AjaxController::class, 'getDsitrict'])->name('get.district');
Route::get('/area/{id?}', ['as'=>'get.area',AjaxController::class, 'getArea'])->name('get.area');
Route::get('/branch-by-area/{id?}', ['as'=>'get.branch_by_area',AjaxController::class, 'getBranchByArea'])->name('get.branch_by_area');
Route::get('/upazila/{id?}', ['as'=>'get.upazila',AjaxController::class, 'getUpazila'])->name('get.upazila');
Route::get('/thana/{id?}', ['as'=>'get.thana',AjaxController::class, 'getThana'])->name('get.thana');
Route::get('/upazila/self/{id?}', ['as'=>'get.upazila.self',AjaxController::class, 'getUpazilaSelf'])->name('get.upazila.self');
Route::get('/product/{id?}', ['as'=>'get.product',AjaxController::class, 'getProduct'])->name('get.product');
Route::get('/products/{id?}', ['as'=>'get.products',AjaxController::class, 'getProducts'])->name('get.products');
Route::get('/unit/{id?}', ['as'=>'get.unit',AjaxController::class, 'getUnit'])->name('get.unit');
Route::get('/get-users', ['as'=>'get.users',AjaxController::class, 'getUsers'])->name('get.users');
Route::get('/get-branches', ['as'=>'get.branches',AjaxController::class, 'getBranches'])->name('get.branches');

Route::get('/get-users/{contact?}', ['as'=>'get.users.contact',AjaxController::class, 'getUsersContact'])->name('get.users.contact');
Route::get('/get-users-name/{contact?}', ['as'=>'get.users.name',AjaxController::class, 'getUsersName'])->name('get.users.name');

Route::get('/branch/{branch_id?}', ['as'=>'get.branch',AjaxController::class, 'getBranch'])->name('get.branch');
Route::get('/branch-unit/{branch_id?}', ['as'=>'get.branch_unit',AjaxController::class, 'getBranchUnit'])->name('get.branch_unit');
Route::get('/vice-president/{branch_id?}', ['as'=>'get.vice_president',AjaxController::class, 'getVicePresident'])->name('get.vice_president');
Route::get('/caliph/{branch_id?}', ['as'=>'get.caliph',AjaxController::class, 'getCaliph'])->name('get.caliph');
Route::get('/president/{branch_id?}', ['as'=>'get.president',AjaxController::class, 'getpresident'])->name('get.president');
Route::get('/application/{appication_id?}/{case_status_id?}', ['as'=>'get.case_status_change',AjaxController::class, 'case_status_change'])->name('get.case_status_change');

// this route for user panel not needed
Route::get('/test',function(){
    return engToBnHlp(123);
});


//Site Route
Route::get('/', ['as'=>'site.home',SiteAllController::class, 'index'])->name('site.home');

Route::group(['prefix'=>'pages'], function(){
    Route::get('{slug?}', ['as'=>'site.content',SiteAllController::class, 'content'])->name('site.content');
});

// User Auth Part
Auth::routes();
Route::get('/logout', ['middleware'=>'auth:web',LoginController::class, 'logout'])->name('logout');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth', 'prefix'=>'user','as'=>'user.'], function() {
    Route::get('/dashboard', ['as'=>'dashboard',DashboardController::class, 'index'])->name('dashboard');
});


// Admin Auth Part

Route::group(['middleware'=>'guest:admin', 'prefix'=>'admin','as'=>'admin.'], function() {

    Route::get('/',function(){
        return redirect()->route('admin.login');
    });
    Route::post('/loginotp', ['as'=>'loginotp',AuthController::class, 'loginotpStore'])->name('loginotp');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', ['as'=>'login',AuthController::class, 'loginStore']);
    Route::get('/password/reset', ['as'=>'password.request',AuthController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/reset', ['as'=>'password.email',AuthController::class, 'sendResetLinkEmail'])->name('password.email');
});
Route::group(['prefix'=>'admin','as'=>'admin.'], function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/change-password/{id?}', [AuthController::class, 'changePassword'])->name('change.password');
});

Route::group(['middleware'=>'auth:admin', 'prefix'=>'admin','as'=>'admin.'], function() {

    Route::get('/log', function(){

        //return ActivityLog::inLog(['versions','users'])->get();
        //return ActivityLog::inLog('versions')->get();
        //return $result = ActivityLog::get();
        //return $result = ActivityLog::logNames(['services','admins'])->get();


        //return ActivityLog::with('admin')->get();
        //return ActivityLog::with('admin')->get();
        //return ActivityLog::with('causer')->get()->first();
        //return ActivityLog::with('admin')->get()->last();
        //return $result = ActivityLog::with('admin','getCode')->logNames(['services'])->first();
        $result = ActivityLog::with('admin')->logNames(['services'])->first();
        $result->code = $result->subject_type::find($result->subject_id)->code;
        return $result;
    });

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix'=>'role-permissions'], function(){
        //Role route
        Route::get('/role', ['as'=>'role',RoleController::class, 'index'])->middleware('can:read,App\Models\Role')->name('role');

        Route::get('/role/create', ['as'=>'role.create',RoleController::class, 'create'])->middleware('can:create,App\Models\Role')->name('role.create');

        Route::post('/role/store', ['as'=>'role.store',RoleController::class, 'store'])->middleware('can:create,App\Models\Role')->name('role.store');

        Route::get('/role/edit/{id?}', ['as'=>'role.edit',RoleController::class, 'edit'])->middleware('can:update,App\Models\Role')->name('role.edit');

        Route::put('/role/update/{id?}', ['as'=>'role.update',RoleController::class, 'update'])->middleware('can:update,App\Models\Role')->name('role.update');

        Route::get('/role/delete/{id?}/{sid?}', ['as'=>'role.delete',RoleController::class, 'delete'])->middleware('can:delete,App\Models\Role')->name('role.delete');
        Route::get('/role/permission/{id?}', ['as'=>'role.permission',RoleController::class, 'permission'])->middleware('can:permission_update,App\Models\Role')->name('role.permission');

        Route::put('/role/permission/update/{id?}', ['as'=>'role.permission.update',RoleController::class, 'permission_update'])->middleware('can:permission_update,App\Models\Role')->name('role.permission.update');

        //UserType route
        Route::get('/user-type', ['as'=>'user_type',UserTypeController::class, 'index'])->middleware('can:read,App\Models\UserType')->name('user_type');

        Route::get('/user-type/create', ['as'=>'user_type.create',UserTypeController::class, 'create'])->middleware('can:create,App\Models\UserType')->name('user_type.create');

        Route::post('/user-type/store', ['as'=>'user_type.store',UserTypeController::class, 'store'])->middleware('can:create,App\Models\UserType')->name('user_type.store');

        Route::get('/user-type/edit/{id?}', ['as'=>'user_type.edit',UserTypeController::class, 'edit'])->middleware('can:update,App\Models\UserType')->name('user_type.edit');

        Route::put('/user-type/update/{id?}', ['as'=>'user_type.update',UserTypeController::class, 'update'])->middleware('can:update,App\Models\UserType')->name('user_type.update');

        Route::get('/user-type/delete/{id?}/{sid?}', ['as'=>'user_type.delete',UserTypeController::class, 'delete'])->middleware('can:delete,App\Models\UserType')->name('user_type.delete');


        //SiteSetting route
        Route::get('/site-setting', ['as'=>'site_setting',SiteSettingController::class, 'index'])->middleware('can:read,App\Models\SiteSetting')->name('site_setting');

        Route::get('/site-setting/create', ['as'=>'site_setting.create',SiteSettingController::class, 'create'])->middleware('can:create,App\Models\SiteSetting')->name('site_setting.create');

        Route::post('/site-setting/store', ['as'=>'site_setting.store',SiteSettingController::class, 'store'])->middleware('can:create,App\Models\SiteSetting')->name('site_setting.store');

        Route::get('/site-setting/edit/{id?}', ['as'=>'site_setting.edit',SiteSettingController::class, 'edit'])->middleware('can:update,App\Models\SiteSetting')->name('site_setting.edit');

        Route::put('/site-setting/update/{id?}', ['as'=>'site_setting.update',SiteSettingController::class, 'update'])->middleware('can:update,App\Models\SiteSetting')->name('site_setting.update');

        Route::get('/site-setting/delete/{id?}/{sid?}', ['as'=>'site_setting.delete',SiteSettingController::class, 'delete'])->middleware('can:delete,App\Models\SiteSetting')->name('site_setting.delete');


        //Lang route
        Route::get('/lang', ['as'=>'lang',LangController::class, 'index'])->middleware('can:read,App\Models\Lang')->name('lang');

        Route::get('/lang/create', ['as'=>'lang.create',LangController::class, 'create'])->middleware('can:create,App\Models\Lang')->name('lang.create');

        Route::post('/lang/store', ['as'=>'lang.store',LangController::class, 'store'])->middleware('can:create,App\Models\Lang')->name('lang.store');

        Route::get('/lang/edit/{id?}', ['as'=>'lang.edit',LangController::class, 'edit'])->middleware('can:update,App\Models\Lang')->name('lang.edit');

        Route::put('/lang/update/{id?}', ['as'=>'lang.update',LangController::class, 'update'])->middleware('can:update,App\Models\Lang')->name('lang.update');

        Route::get('/lang/delete/{id?}/{sid?}', ['as'=>'lang.delete',LangController::class, 'delete'])->middleware('can:delete,App\Models\Lang')->name('lang.delete');


    });

    Route::group(['prefix'=>'administrative-locations'], function(){

        //Division route
        Route::get('/division', ['as'=>'division',DivisionController::class, 'index'])->middleware('can:read,App\Models\Division')->name('division');

        Route::get('/division/create', ['as'=>'division.create',DivisionController::class, 'create'])->middleware('can:create,App\Models\Division')->name('division.create');

        Route::post('/division/store', ['as'=>'division.store',DivisionController::class, 'store'])->middleware('can:create,App\Models\Division')->name('division.store');

        Route::get('/division/edit/{id?}', ['as'=>'division.edit',DivisionController::class, 'edit'])->middleware('can:update,App\Models\Division')->name('division.edit');

        Route::put('/division/update/{id?}', ['as'=>'division.update',DivisionController::class, 'update'])->middleware('can:update,App\Models\Division')->name('division.update');

        Route::get('/division/delete/{id?}/{sid?}', ['as'=>'division.delete',DivisionController::class, 'delete'])->middleware('can:delete,App\Models\Division')->name('division.delete');

        //District route
        Route::get('/district', ['as'=>'district',DistrictController::class, 'index'])->middleware('can:read,App\Models\District')->name('district');

        Route::get('/district/create', ['as'=>'district.create',DistrictController::class, 'create'])->middleware('can:create,App\Models\District')->name('district.create');

        Route::post('/district/store', ['as'=>'district.store',DistrictController::class, 'store'])->middleware('can:create,App\Models\District')->name('district.store');

        Route::get('/district/edit/{id?}', ['as'=>'district.edit',DistrictController::class, 'edit'])->middleware('can:update,App\Models\District')->name('district.edit');

        Route::put('/district/update/{id?}', ['as'=>'district.update',DistrictController::class, 'update'])->middleware('can:update,App\Models\District')->name('district.update');

        Route::get('/district/delete/{id?}/{sid?}', ['as'=>'district.delete',DistrictController::class, 'delete'])->middleware('can:delete,App\Models\District')->name('district.delete');

        //Upazila route
        Route::get('/upazila', ['as'=>'upazila',UpazilaController::class, 'index'])->middleware('can:read,App\Models\Upazila')->name('upazila');

        Route::get('/upazila/create', ['as'=>'upazila.create',UpazilaController::class, 'create'])->middleware('can:create,App\Models\Upazila')->name('upazila.create');

        Route::post('/upazila/store', ['as'=>'upazila.store',UpazilaController::class, 'store'])->middleware('can:create,App\Models\Upazila')->name('upazila.store');

        Route::get('/upazila/edit/{id?}', ['as'=>'upazila.edit',UpazilaController::class, 'edit'])->middleware('can:update,App\Models\Upazila')->name('upazila.edit');

        Route::put('/upazila/update/{id?}', ['as'=>'upazila.update',UpazilaController::class, 'update'])->middleware('can:update,App\Models\Upazila')->name('upazila.update');

        Route::get('/upazila/delete/{id?}/{sid?}', ['as'=>'upazila.delete',UpazilaController::class, 'delete'])->middleware('can:delete,App\Models\Upazila')->name('upazila.delete');

        //Thana route
        Route::get('/thana', ['as'=>'thana',ThanaController::class, 'index'])->middleware('can:read,App\Models\Thana')->name('thana');

        Route::get('/thana/create', ['as'=>'thana.create',ThanaController::class, 'create'])->middleware('can:create,App\Models\Thana')->name('thana.create');

        Route::post('/thana/store', ['as'=>'thana.store',ThanaController::class, 'store'])->middleware('can:create,App\Models\Thana')->name('thana.store');

        Route::get('/thana/edit/{id?}', ['as'=>'thana.edit',ThanaController::class, 'edit'])->middleware('can:update,App\Models\Thana')->name('thana.edit');

        Route::put('/thana/update/{id?}', ['as'=>'thana.update',ThanaController::class, 'update'])->middleware('can:update,App\Models\Thana')->name('thana.update');

        Route::get('/thana/delete/{id?}/{sid?}', ['as'=>'thana.delete',ThanaController::class, 'delete'])->middleware('can:delete,App\Models\Thana')->name('thana.delete');

    });

    Route::group(['prefix'=>'locations'], function(){

        //Association route
        Route::get('/association', ['as'=>'association',AssociationController::class, 'index'])->middleware('can:read,App\Models\Association')->name('association');

        Route::get('/association/create', ['as'=>'association.create',AssociationController::class, 'create'])->middleware('can:create,App\Models\Association')->name('association.create');

        Route::post('/association/store', ['as'=>'association.store',AssociationController::class, 'store'])->middleware('can:create,App\Models\Association')->name('association.store');

        Route::get('/association/edit/{id?}', ['as'=>'association.edit',AssociationController::class, 'edit'])->middleware('can:update,App\Models\Association')->name('association.edit');

        Route::put('/association/update/{id?}', ['as'=>'association.update',AssociationController::class, 'update'])->middleware('can:update,App\Models\Association')->name('association.update');

        Route::get('/association/delete/{id?}/{sid?}', ['as'=>'association.delete',AssociationController::class, 'delete'])->middleware('can:delete,App\Models\Association')->name('association.delete');

        //Area route
        Route::get('/area', ['as'=>'area',AreaController::class, 'index'])->middleware('can:read,App\Models\Area')->name('area');

        Route::get('/area/create', ['as'=>'area.create',AreaController::class, 'create'])->middleware('can:create,App\Models\Area')->name('area.create');

        Route::post('/area/store', ['as'=>'area.store',AreaController::class, 'store'])->middleware('can:create,App\Models\Area')->name('area.store');

        Route::get('/area/edit/{id?}', ['as'=>'area.edit',AreaController::class, 'edit'])->middleware('can:update,App\Models\Area')->name('area.edit');

        Route::put('/area/update/{id?}', ['as'=>'area.update',AreaController::class, 'update'])->middleware('can:update,App\Models\Area')->name('area.update');

        Route::get('/area/delete/{id?}/{sid?}', ['as'=>'area.delete',AreaController::class, 'delete'])->middleware('can:delete,App\Models\Area')->name('area.delete');

        //Branch route
        Route::get('/branch', ['as'=>'branch',BranchController::class, 'index'])->middleware('can:read,App\Models\Branch')->name('branch');

        Route::get('/branch/create', ['as'=>'branch.create',BranchController::class, 'create'])->middleware('can:create,App\Models\Branch')->name('branch.create');

        Route::post('/branch/store', ['as'=>'branch.store',BranchController::class, 'store'])->middleware('can:create,App\Models\Branch')->name('branch.store');

        Route::get('/branch/edit/{id?}', ['as'=>'branch.edit',BranchController::class, 'edit'])->middleware('can:update,App\Models\Branch')->name('branch.edit');

        Route::put('/branch/update/{id?}', ['as'=>'branch.update',BranchController::class, 'update'])->middleware('can:update,App\Models\Branch')->name('branch.update');

        Route::get('/branch/delete/{id?}/{sid?}', ['as'=>'branch.delete',BranchController::class, 'delete'])->middleware('can:delete,App\Models\Branch')->name('branch.delete');

        //BranchUnit route
        Route::get('/branch-unit', ['as'=>'branch_unit',BranchUnitController::class, 'index'])->middleware('can:read,App\Models\BranchUnit')->name('branch_unit');

        Route::get('/branch-unit/create', ['as'=>'branch_unit.create',BranchUnitController::class, 'create'])->middleware('can:create,App\Models\BranchUnit')->name('branch_unit.create');

        Route::post('/branch-unit/store', ['as'=>'branch_unit.store',BranchUnitController::class, 'store'])->middleware('can:create,App\Models\BranchUnit')->name('branch_unit.store');

        Route::get('/branch-unit/edit/{id?}', ['as'=>'branch_unit.edit',BranchUnitController::class, 'edit'])->middleware('can:update,App\Models\BranchUnit')->name('branch_unit.edit');

        Route::put('/branch-unit/update/{id?}', ['as'=>'branch_unit.update',BranchUnitController::class, 'update'])->middleware('can:update,App\Models\BranchUnit')->name('branch_unit.update');

        Route::get('/branch-unit/delete/{id?}/{sid?}', ['as'=>'branch_unit.delete',BranchUnitController::class, 'delete'])->middleware('can:delete,App\Models\BranchUnit')->name('branch_unit.delete');

    });

    Route::group(['prefix'=>'users'], function(){

        //User route
        Route::get('/user', ['as'=>'user',UserController::class, 'index'])->middleware('can:read,App\Models\User')->name('user');
        Route::get('/user-export', ['as'=>'user.export',UserController::class, 'export'])->name('user.export');
        Route::get('/user-pdf', ['as'=>'user.pdf',UserController::class, 'pdf'])->name('user.pdf');

        Route::get('/user/datatable', ['as'=>'user.datatable',UserController::class, 'datatable'])->middleware('can:read,App\Models\User')->name('user.datatable');

        Route::get('/user/view/{id?}', ['as'=>'user.view',UserController::class, 'view'])->middleware('can:view,App\Models\User')->name('user.view');

        Route::get('/user/print/{id?}', ['as'=>'user.print',UserController::class, 'print'])->middleware('can:print,App\Models\User')->name('user.print');

        Route::get('/user/create', ['as'=>'user.create',UserController::class, 'create'])->middleware('can:create,App\Models\User')->name('user.create');

        Route::post('/user/store', ['as'=>'user.store',UserController::class, 'store'])->middleware('can:create,App\Models\User')->name('user.store');
        Route::post('/user/search', ['as'=>'user.search',UserController::class, 'search'])->middleware('can:create,App\Models\User')->name('user.search');

        Route::get('/user/edit/{id?}', ['as'=>'user.edit',UserController::class, 'edit'])->middleware('can:update,App\Models\User')->name('user.edit');

        Route::put('/user/update/{id?}', ['as'=>'user.update',UserController::class, 'update'])->middleware('can:update,App\Models\User')->name('user.update');

        Route::get('/user/delete/{id?}/{sid?}', ['as'=>'user.delete',UserController::class, 'delete'])->middleware('can:delete,App\Models\User')->name('user.delete');


        //Admin route
        Route::get('/admin', ['as'=>'admin',AdminController::class, 'index'])->middleware('can:read,App\Models\Admin')->name('admin');
        Route::get('/admin-export', ['as'=>'admin.export',AdminController::class, 'export'])->name('admin.export');
        Route::get('/admin-pdf', ['as'=>'admin.pdf',AdminController::class, 'pdf'])->name('admin.pdf');

        Route::get('/admin/datatable', ['as'=>'admin.datatable',AdminController::class, 'datatable'])->middleware('can:read,App\Models\Admin')->name('admin.datatable');

        Route::get('/admin/create', ['as'=>'admin.create',AdminController::class, 'create'])->middleware('can:create,App\Models\Admin')->name('admin.create');

        Route::post('/admin/store', ['as'=>'admin.store',AdminController::class, 'store'])->middleware('can:create,App\Models\Admin')->name('admin.store');

        Route::get('/admin/edit/{id?}', ['as'=>'admin.edit',AdminController::class, 'edit'])->middleware('can:update,App\Models\Admin')->name('admin.edit');

        Route::put('/admin/update/{id?}', ['as'=>'admin.update',AdminController::class, 'update'])->middleware('can:update,App\Models\Admin')->name('admin.update');

        Route::get('/admin/delete/{id?}/{sid?}', ['as'=>'admin.delete',AdminController::class, 'delete'])->middleware('can:delete,App\Models\Admin')->name('admin.delete');

        //BranchUser route
        Route::get('/branch-user', ['as'=>'branch_user',BranchUserController::class, 'index'])->middleware('can:read,App\Models\BranchUser')->name('branch_user');
        Route::get('/branch-user-export', ['as'=>'branch_user.export',BranchUserController::class, 'export'])->name('branch_user.export');
        Route::get('/branch-user-pdf', ['as'=>'branch_user.pdf',BranchUserController::class, 'pdf'])->name('branch_user.pdf');

        Route::get('/branch-user/datatable', ['as'=>'branch_user.datatable',BranchUserController::class, 'datatable'])->middleware('can:read,App\Models\BranchUser')->name('branch_user.datatable');

        Route::get('/branch-user/create', ['as'=>'branch_user.create',BranchUserController::class, 'create'])->middleware('can:create,App\Models\BranchUser')->name('branch_user.create');

        Route::post('/branch-user/store', ['as'=>'branch_user.store',BranchUserController::class, 'store'])->middleware('can:create,App\Models\BranchUser')->name('branch_user.store');

        Route::get('/branch-user/edit/{id?}', ['as'=>'branch_user.edit',BranchUserController::class, 'edit'])->middleware('can:update,App\Models\BranchUser')->name('branch_user.edit');

        Route::put('/branch-user/update/{id?}', ['as'=>'branch_user.update',BranchUserController::class, 'update'])->middleware('can:update,App\Models\BranchUser')->name('branch_user.update');

        Route::get('/branch-user/delete/{id?}/{sid?}', ['as'=>'branch_user.delete',BranchUserController::class, 'delete'])->middleware('can:delete,App\Models\BranchUser')->name('branch_user.delete');


        //CentralCommittee route
        Route::get('/central-committee', ['as'=>'central_committee',CentralCommitteeController::class, 'index'])->middleware('can:read,App\Models\CentralCommittee')->name('central_committee');

        Route::get('/central-committee/create', ['as'=>'central_committee.create',CentralCommitteeController::class, 'create'])->middleware('can:create,App\Models\CentralCommittee')->name('central_committee.create');

        Route::post('/central-committee/store', ['as'=>'central_committee.store',CentralCommitteeController::class, 'store'])->middleware('can:create,App\Models\CentralCommittee')->name('central_committee.store');

        Route::get('/central-committee/edit/{id?}', ['as'=>'central_committee.edit',CentralCommitteeController::class, 'edit'])->middleware('can:update,App\Models\CentralCommittee')->name('central_committee.edit');

        Route::put('/central-committee/update/{id?}', ['as'=>'central_committee.update',CentralCommitteeController::class, 'update'])->middleware('can:update,App\Models\CentralCommittee')->name('central_committee.update');

        Route::get('/central-committee/delete/{id?}/{sid?}', ['as'=>'central_committee.delete',CentralCommitteeController::class, 'delete'])->middleware('can:delete,App\Models\CentralCommittee')->name('central_committee.delete');


        //DistrictCommittee route
        Route::get('/district-committee', ['as'=>'district_committee',DistrictCommitteeController::class, 'index'])->middleware('can:read,App\Models\DistrictCommittee')->name('district_committee');

        Route::get('/district-committee/create', ['as'=>'district_committee.create',DistrictCommitteeController::class, 'create'])->middleware('can:create,App\Models\DistrictCommittee')->name('district_committee.create');

        Route::post('/district-committee/store', ['as'=>'district_committee.store',DistrictCommitteeController::class, 'store'])->middleware('can:create,App\Models\DistrictCommittee')->name('district_committee.store');

        Route::get('/district-committee/edit/{id?}', ['as'=>'district_committee.edit',DistrictCommitteeController::class, 'edit'])->middleware('can:update,App\Models\DistrictCommittee')->name('district_committee.edit');

        Route::put('/district-committee/update/{id?}', ['as'=>'district_committee.update',DistrictCommitteeController::class, 'update'])->middleware('can:update,App\Models\DistrictCommittee')->name('district_committee.update');

        Route::get('/district-committee/delete/{id?}/{sid?}', ['as'=>'district_committee.delete',DistrictCommitteeController::class, 'delete'])->middleware('can:delete,App\Models\DistrictCommittee')->name('district_committee.delete');

        //UpazilaCommittee route
        Route::get('/upazila-committee', ['as'=>'upazila_committee',UpazilaCommitteeController::class, 'index'])->middleware('can:read,App\Models\UpazilaCommittee')->name('upazila_committee');

        Route::get('/upazila-committee/create', ['as'=>'upazila_committee.create',UpazilaCommitteeController::class, 'create'])->middleware('can:create,App\Models\UpazilaCommittee')->name('upazila_committee.create');

        Route::post('/upazila-committee/store', ['as'=>'upazila_committee.store',UpazilaCommitteeController::class, 'store'])->middleware('can:create,App\Models\UpazilaCommittee')->name('upazila_committee.store');

        Route::get('/upazila-committee/edit/{id?}', ['as'=>'upazila_committee.edit',UpazilaCommitteeController::class, 'edit'])->middleware('can:update,App\Models\UpazilaCommittee')->name('upazila_committee.edit');

        Route::put('/upazila-committee/update/{id?}', ['as'=>'upazila_committee.update',UpazilaCommitteeController::class, 'update'])->middleware('can:update,App\Models\UpazilaCommittee')->name('upazila_committee.update');

        Route::get('/upazila-committee/delete/{id?}/{sid?}', ['as'=>'upazila_committee.delete',UpazilaCommitteeController::class, 'delete'])->middleware('can:delete,App\Models\UpazilaCommittee')->name('upazila_committee.delete');


    });

    Route::group(['prefix'=>'master'], function(){

        // //Size route
        // Route::get('/size', ['as'=>'size',SizeController::class, 'index'])->middleware('can:read,App\Models\Size')->name('size');

        // Route::get('/size/create', ['as'=>'size.create',SizeController::class, 'create'])->middleware('can:create,App\Models\Size')->name('size.create');

        // Route::post('/size/store', ['as'=>'size.store',SizeController::class, 'store'])->middleware('can:create,App\Models\Size')->name('size.store');

        // Route::get('/size/edit/{id?}', ['as'=>'size.edit',SizeController::class, 'edit'])->middleware('can:update,App\Models\Size')->name('size.edit');

        // Route::put('/size/update/{id?}', ['as'=>'size.update',SizeController::class, 'update'])->middleware('can:update,App\Models\Size')->name('size.update');

        // Route::get('/size/delete/{id?}/{sid?}', ['as'=>'size.delete',SizeController::class, 'delete'])->middleware('can:delete,App\Models\Size')->name('size.delete');

        // //Condition route
        // Route::get('/condition', ['as'=>'condition',ConditionController::class, 'index'])->middleware('can:read,App\Models\Condition')->name('condition');

        // Route::get('/condition/create', ['as'=>'condition.create',ConditionController::class, 'create'])->middleware('can:create,App\Models\Condition')->name('condition.create');

        // Route::post('/condition/store', ['as'=>'condition.store',ConditionController::class, 'store'])->middleware('can:create,App\Models\Condition')->name('condition.store');

        // Route::get('/condition/edit/{id?}', ['as'=>'condition.edit',ConditionController::class, 'edit'])->middleware('can:update,App\Models\Condition')->name('condition.edit');

        // Route::put('/condition/update/{id?}', ['as'=>'condition.update',ConditionController::class, 'update'])->middleware('can:update,App\Models\Condition')->name('condition.update');

        // Route::get('/condition/delete/{id?}/{sid?}', ['as'=>'condition.delete',ConditionController::class, 'delete'])->middleware('can:delete,App\Models\Condition')->name('condition.delete');

        // //Color route
        // Route::get('/color', ['as'=>'color',ColorController::class, 'index'])->middleware('can:read,App\Models\Color')->name('color');

        // Route::get('/color/create', ['as'=>'color.create',ColorController::class, 'create'])->middleware('can:create,App\Models\Color')->name('color.create');

        // Route::post('/color/store', ['as'=>'color.store',ColorController::class, 'store'])->middleware('can:create,App\Models\Color')->name('color.store');

        // Route::get('/color/edit/{id?}', ['as'=>'color.edit',ColorController::class, 'edit'])->middleware('can:update,App\Models\Color')->name('color.edit');

        // Route::put('/color/update/{id?}', ['as'=>'color.update',ColorController::class, 'update'])->middleware('can:update,App\Models\Color')->name('color.update');

        // Route::get('/color/delete/{id?}/{sid?}', ['as'=>'color.delete',ColorController::class, 'delete'])->middleware('can:delete,App\Models\Color')->name('color.delete');


        //OfficeType route
        Route::get('/office-type', ['as'=>'office_type',OfficeTypeController::class, 'index'])->middleware('can:read,App\Models\OfficeType')->name('office_type');

        Route::get('/office-type/create', ['as'=>'office_type.create',OfficeTypeController::class, 'create'])->middleware('can:create,App\Models\OfficeType')->name('office_type.create');

        Route::post('/office-type/store', ['as'=>'office_type.store',OfficeTypeController::class, 'store'])->middleware('can:create,App\Models\OfficeType')->name('office_type.store');

        Route::get('/office-type/edit/{id?}', ['as'=>'office_type.edit',OfficeTypeController::class, 'edit'])->middleware('can:update,App\Models\OfficeType')->name('office_type.edit');

        Route::put('/office-type/update/{id?}', ['as'=>'office_type.update',OfficeTypeController::class, 'update'])->middleware('can:update,App\Models\OfficeType')->name('office_type.update');

        Route::get('/office-type/delete/{id?}/{sid?}', ['as'=>'office_type.delete',OfficeTypeController::class, 'delete'])->middleware('can:delete,App\Models\OfficeType')->name('office_type.delete');

        //ServiceType route
        Route::get('/service-type', ['as'=>'service_type',ServiceTypeController::class, 'index'])->middleware('can:read,App\Models\ServiceType')->name('service_type');

        Route::get('/service-type/create', ['as'=>'service_type.create',ServiceTypeController::class, 'create'])->middleware('can:create,App\Models\ServiceType')->name('service_type.create');

        Route::post('/service-type/store', ['as'=>'service_type.store',ServiceTypeController::class, 'store'])->middleware('can:create,App\Models\ServiceType')->name('service_type.store');

        Route::get('/service-type/edit/{id?}', ['as'=>'service_type.edit',ServiceTypeController::class, 'edit'])->middleware('can:update,App\Models\ServiceType')->name('service_type.edit');

        Route::put('/service-type/update/{id?}', ['as'=>'service_type.update',ServiceTypeController::class, 'update'])->middleware('can:update,App\Models\ServiceType')->name('service_type.update');

        Route::get('/service-type/delete/{id?}/{sid?}', ['as'=>'service_type.delete',ServiceTypeController::class, 'delete'])->middleware('can:delete,App\Models\ServiceType')->name('service_type.delete');

        //Service route
        Route::get('/service', ['as'=>'service',ServiceController::class, 'index'])->middleware('can:read,App\Models\Service')->name('service');

        Route::get('/service/create', ['as'=>'service.create',ServiceController::class, 'create'])->middleware('can:create,App\Models\Service')->name('service.create');

        Route::post('/service/store', ['as'=>'service.store',ServiceController::class, 'store'])->middleware('can:create,App\Models\Service')->name('service.store');

        Route::get('/service/edit/{id?}', ['as'=>'service.edit',ServiceController::class, 'edit'])->middleware('can:update,App\Models\Service')->name('service.edit');

        Route::put('/service/update/{id?}', ['as'=>'service.update',ServiceController::class, 'update'])->middleware('can:update,App\Models\Service')->name('service.update');

        Route::get('/service/delete/{id?}/{sid?}', ['as'=>'service.delete',ServiceController::class, 'delete'])->middleware('can:delete,App\Models\Service')->name('service.delete');

        //CaseType route
        Route::get('/case-type', ['as'=>'case_type',CaseTypeController::class, 'index'])->middleware('can:read,App\Models\CaseType')->name('case_type');

        Route::get('/case-type/create', ['as'=>'case_type.create',CaseTypeController::class, 'create'])->middleware('can:create,App\Models\CaseType')->name('case_type.create');

        Route::post('/case-type/store', ['as'=>'case_type.store',CaseTypeController::class, 'store'])->middleware('can:create,App\Models\CaseType')->name('case_type.store');

        Route::get('/case-type/edit/{id?}', ['as'=>'case_type.edit',CaseTypeController::class, 'edit'])->middleware('can:update,App\Models\CaseType')->name('case_type.edit');

        Route::put('/case-type/update/{id?}', ['as'=>'case_type.update',CaseTypeController::class, 'update'])->middleware('can:update,App\Models\CaseType')->name('case_type.update');

        Route::get('/case-type/delete/{id?}/{sid?}', ['as'=>'case_type.delete',CaseTypeController::class, 'delete'])->middleware('can:delete,App\Models\CaseType')->name('case_type.delete');




        //CaseCategory route
        Route::get('/case-category', ['as'=>'case_category',CaseCategoryController::class, 'index'])->middleware('can:read,App\Models\CaseCategory')->name('case_category');

        Route::get('/case-category/create', ['as'=>'case_category.create',CaseCategoryController::class, 'create'])->middleware('can:create,App\Models\CaseCategory')->name('case_category.create');

        Route::post('/case-category/store', ['as'=>'case_category.store',CaseCategoryController::class, 'store'])->middleware('can:create,App\Models\CaseCategory')->name('case_category.store');

        Route::get('/case-category/edit/{id?}', ['as'=>'case_category.edit',CaseCategoryController::class, 'edit'])->middleware('can:update,App\Models\CaseCategory')->name('case_category.edit');

        Route::put('/case-category/update/{id?}', ['as'=>'case_category.update',CaseCategoryController::class, 'update'])->middleware('can:update,App\Models\CaseCategory')->name('case_category.update');

        Route::get('/case-category/delete/{id?}/{sid?}', ['as'=>'case_category.delete',CaseCategoryController::class, 'delete'])->middleware('can:delete,App\Models\CaseCategory')->name('case_category.delete');

        //CaseStatus route
        Route::get('/case-status', ['as'=>'case_status',CaseStatusController::class, 'index'])->middleware('can:read,App\Models\CaseStatus')->name('case_status');

        Route::get('/case-status/create', ['as'=>'case_status.create',CaseStatusController::class, 'create'])->middleware('can:create,App\Models\CaseStatus')->name('case_status.create');

        Route::post('/case-status/store', ['as'=>'case_status.store',CaseStatusController::class, 'store'])->middleware('can:create,App\Models\CaseStatus')->name('case_status.store');

        Route::get('/case-status/edit/{id?}', ['as'=>'case_status.edit',CaseStatusController::class, 'edit'])->middleware('can:update,App\Models\CaseStatus')->name('case_status.edit');

        Route::put('/case-status/update/{id?}', ['as'=>'case_status.update',CaseStatusController::class, 'update'])->middleware('can:update,App\Models\CaseStatus')->name('case_status.update');

        Route::get('/case-status/delete/{id?}/{sid?}', ['as'=>'case_status.delete',CaseStatusController::class, 'delete'])->middleware('can:delete,App\Models\CaseStatus')->name('case_status.delete');


        //GuardianType route
        Route::get('/guardian-type', ['as'=>'guardian_type',GuardianTypeController::class, 'index'])->middleware('can:read,App\Models\GuardianType')->name('guardian_type');

        Route::get('/guardian-type/create', ['as'=>'guardian_type.create',GuardianTypeController::class, 'create'])->middleware('can:create,App\Models\GuardianType')->name('guardian_type.create');

        Route::post('/guardian-type/store', ['as'=>'guardian_type.store',GuardianTypeController::class, 'store'])->middleware('can:create,App\Models\GuardianType')->name('guardian_type.store');

        Route::get('/guardian-type/edit/{id?}', ['as'=>'guardian_type.edit',GuardianTypeController::class, 'edit'])->middleware('can:update,App\Models\GuardianType')->name('guardian_type.edit');

        Route::put('/guardian-type/update/{id?}', ['as'=>'guardian_type.update',GuardianTypeController::class, 'update'])->middleware('can:update,App\Models\GuardianType')->name('guardian_type.update');

        Route::get('/guardian-type/delete/{id?}/{sid?}', ['as'=>'guardian_type.delete',GuardianTypeController::class, 'delete'])->middleware('can:delete,App\Models\GuardianType')->name('guardian_type.delete');


        //Designation route
        Route::get('/designation', ['as'=>'designation',DesignationController::class, 'index'])->middleware('can:read,App\Models\Designation')->name('designation');

        Route::get('/designation/create', ['as'=>'designation.create',DesignationController::class, 'create'])->middleware('can:create,App\Models\Designation')->name('designation.create');

        Route::post('/designation/store', ['as'=>'designation.store',DesignationController::class, 'store'])->middleware('can:create,App\Models\Designation')->name('designation.store');

        Route::get('/designation/edit/{id?}', ['as'=>'designation.edit',DesignationController::class, 'edit'])->middleware('can:update,App\Models\Designation')->name('designation.edit');

        Route::put('/designation/update/{id?}', ['as'=>'designation.update',DesignationController::class, 'update'])->middleware('can:update,App\Models\Designation')->name('designation.update');

        Route::get('/designation/delete/{id?}/{sid?}', ['as'=>'designation.delete',DesignationController::class, 'delete'])->middleware('can:delete,App\Models\Designation')->name('designation.delete');

        //OfficeDesignation route
        Route::get('/office-designation', ['as'=>'office_designation',OfficeDesignationController::class, 'index'])->middleware('can:read,App\Models\OfficeDesignation')->name('office_designation');

        Route::get('/office-designation/create', ['as'=>'office_designation.create',OfficeDesignationController::class, 'create'])->middleware('can:create,App\Models\OfficeDesignation')->name('office_designation.create');

        Route::post('/office_designation/store', ['as'=>'office_designation.store',OfficeDesignationController::class, 'store'])->middleware('can:create,App\Models\OfficeDesignation')->name('office_designation.store');

        Route::get('/office-designation/edit/{id?}', ['as'=>'office_designation.edit',OfficeDesignationController::class, 'edit'])->middleware('can:update,App\Models\OfficeDesignation')->name('office_designation.edit');

        Route::put('/office-designation/update/{id?}', ['as'=>'office_designation.update',OfficeDesignationController::class, 'update'])->middleware('can:update,App\Models\OfficeDesignation')->name('office_designation.update');

        Route::get('/office-designation/delete/{id?}/{sid?}', ['as'=>'office_designation.delete',OfficeDesignationController::class, 'delete'])->middleware('can:delete,App\Models\OfficeDesignation')->name('office_designation.delete');

        //Risk route
        Route::get('/risk', ['as'=>'risk',RiskController::class, 'index'])->middleware('can:read,App\Models\Risk')->name('risk');

        Route::get('/risk/create', ['as'=>'risk.create',RiskController::class, 'create'])->middleware('can:create,App\Models\Risk')->name('risk.create');

        Route::post('/risk/store', ['as'=>'risk.store',RiskController::class, 'store'])->middleware('can:create,App\Models\Risk')->name('risk.store');

        Route::get('/risk/edit/{id?}', ['as'=>'risk.edit',RiskController::class, 'edit'])->middleware('can:update,App\Models\Risk')->name('risk.edit');

        Route::put('/risk/update/{id?}', ['as'=>'risk.update',RiskController::class, 'update'])->middleware('can:update,App\Models\Risk')->name('risk.update');

        Route::get('/risk/delete/{id?}/{sid?}', ['as'=>'risk.delete',RiskController::class, 'delete'])->middleware('can:delete,App\Models\Risk')->name('risk.delete');


    });


    Route::group(['prefix'=>'applications'], function(){

        //Application route
        Route::get('/application', ['as'=>'application',ApplicationController::class, 'index'])->middleware('can:read,App\Models\Application')->name('application');
        Route::get('/application/create', ['as'=>'application.create',ApplicationController::class, 'create'])->middleware('can:create,App\Models\Application')->name('application.create');
        Route::post('/application/store', ['as'=>'application.store',ApplicationController::class, 'store'])->middleware('can:create,App\Models\Application')->name('application.store');
        Route::get('/application/edit/{id?}', ['as'=>'application.edit',ApplicationController::class, 'edit'])->middleware('can:update,App\Models\Application')->name('application.edit');
        Route::put('/application/update/{id?}', ['as'=>'application.update',ApplicationController::class, 'update'])->middleware('can:update,App\Models\Application')->name('application.update');
        Route::get('/application/delete/{id?}/{sid?}', ['as'=>'application.delete',ApplicationController::class, 'delete'])->middleware('can:delete,App\Models\Application')->name('application.delete');
        Route::get('/application-file/delete/{id?}/{sid?}', ['as'=>'application_file.delete',ApplicationController::class, 'delete_file'])->middleware('can:delete_single_file,App\Models\Application')->name('application_file.delete');
        Route::get('/application/delete-suspicious-info/{id?}/{sid?}', ['as'=>'application.delete_suspicious_info',ApplicationController::class, 'delete_suspicious_info'])->middleware('can:delete_suspicious_info,App\Models\Application')->name('application.delete_suspicious_info');
        Route::get('/application/edit-suspicious-info/{id?}', ['as'=>'application.edit_suspicious_info',ApplicationController::class, 'edit_suspicious_info'])->middleware('can:edit_suspicious_info,App\Models\Application')->name('application.edit_suspicious_info');
        Route::put('/application/update-suspicious-info/{id?}', ['as'=>'application.update_suspicious_info',ApplicationController::class, 'update_suspicious_info'])->middleware('can:update_suspicious_info,App\Models\Application')->name('application.update_suspicious_info');
        Route::get('/application/delete-step-info/{id?}/{sid?}', ['as'=>'application.delete_step_info',ApplicationController::class, 'delete_step_info'])->middleware('can:delete_step_info,App\Models\Application')->name('application.delete_step_info');
        Route::get('/application/edit-step-info/{id?}', ['as'=>'application.edit_step_info',ApplicationController::class, 'edit_step_info'])->middleware('can:edit_step_info,App\Models\Application')->name('application.edit_step_info');
        Route::put('/application/update-step-info/{id?}', ['as'=>'application.update_step_info',ApplicationController::class, 'update_step_info'])->middleware('can:update_step_info,App\Models\Application')->name('application.update_step_info');
        Route::get('/application/delete-addmember-info/{id?}/{sid?}', ['as'=>'application.delete_addmember_info',ApplicationController::class, 'delete_addmember_info'])->middleware('can:delete_addmember_info,App\Models\Application')->name('application.delete_addmember_info');
        Route::get('/application/edit-addmember-info/{id?}', ['as'=>'application.edit_addmember_info',ApplicationController::class, 'edit_addmember_info'])->middleware('can:edit_addmember_info,App\Models\Application')->name('application.edit_addmember_info');
        Route::put('/application/update-addmember-info/{id?}', ['as'=>'application.update_addmember_info',ApplicationController::class, 'update_addmember_info'])->middleware('can:update_addmember_info,App\Models\Application')->name('application.update_addmember_info');
        Route::get('/application/edit-feedback-info/{id?}', ['as'=>'application.edit_feedback_info',ApplicationController::class, 'edit_feedback_info'])->middleware('can:edit_feedback_info,App\Models\Application')->name('application.edit_feedback_info');
        Route::put('/application/update-feedback-info/{id?}', ['as'=>'application.update_feedback_info',ApplicationController::class, 'update_feedback_info'])->middleware('can:update_feedback_info,App\Models\Application')->name('application.update_feedback_info');
        
        Route::get('/application/pdf-case-info/{id?}', ['as'=>'application.pdf_case_info',ApplicationController::class, 'pdf_case_info'])->middleware('can:pdf_case_info,App\Models\Application')->name('application.pdf_case_info');
        Route::get('/application/pdf-victim-info/{id?}', ['as'=>'application.pdf_victim_info',ApplicationController::class, 'pdf_victim_info'])->middleware('can:pdf_victim_info,App\Models\Application')->name('application.pdf_victim_info');
        Route::get('/application/pdf-suspicious-info/{id?}', ['as'=>'application.pdf_suspicious_info',ApplicationController::class, 'pdf_suspicious_info'])->middleware('can:pdf_suspicious_info,App\Models\Application')->name('application.pdf_suspicious_info');

        // //Case route
        // Route::get('/case/{cid?}', ['as'=>'case',CaseController::class, 'index'])->middleware('can:read,App\Models\Applicationn')->name('case');
        // Route::get('/case/create', ['as'=>'case.create',CaseController::class, 'create'])->middleware('can:create,App\Models\Applicationn')->name('case.create');
        // Route::post('/case/store', ['as'=>'case.store',CaseController::class, 'store'])->middleware('can:create,App\Models\Applicationn')->name('case.store');
        // Route::get('/case/edit/{id?}', ['as'=>'case.edit',CaseController::class, 'edit'])->middleware('can:update,App\Models\Applicationn')->name('case.edit');
        // Route::put('/case/update/{id?}', ['as'=>'case.update',CaseController::class, 'update'])->middleware('can:update,App\Models\Applicationn')->name('case.update');
        // Route::get('/case/delete/{id?}/{sid?}', ['as'=>'case.delete',CaseController::class, 'delete'])->middleware('can:delete,App\Models\Applicationn')->name('case.delete');
        // Route::get('/case-file/delete/{id?}/{sid?}', ['as'=>'case_file.delete',CaseController::class, 'delete_file'])->middleware('can:delete_single_file,App\Models\Applicationn')->name('case_file.delete');
        // Route::get('/case/delete-suspicious-info/{id?}/{sid?}', ['as'=>'case.delete_suspicious_info',CaseController::class, 'delete_suspicious_info'])->middleware('can:delete_suspicious_info,App\Models\Applicationn')->name('case.delete_suspicious_info');
        // Route::get('/case/edit-suspicious-info/{id?}', ['as'=>'case.edit_suspicious_info',CaseController::class, 'edit_suspicious_info'])->middleware('can:edit_suspicious_info,App\Models\Applicationn')->name('case.edit_suspicious_info');
        // Route::put('/case/update-suspicious-info/{id?}', ['as'=>'case.update_suspicious_info',CaseController::class, 'update_suspicious_info'])->middleware('can:update_suspicious_info,App\Models\Applicationn')->name('case.update_suspicious_info');
        // Route::get('/case/delete-step-info/{id?}/{sid?}', ['as'=>'case.delete_step_info',CaseController::class, 'delete_step_info'])->middleware('can:delete_step_info,App\Models\Applicationn')->name('case.delete_step_info');
        // Route::get('/case/edit-step-info/{id?}', ['as'=>'case.edit_step_info',CaseController::class, 'edit_step_info'])->middleware('can:edit_step_info,App\Models\Applicationn')->name('case.edit_step_info');
        // Route::put('/case/update-step-info/{id?}', ['as'=>'case.update_step_info',CaseController::class, 'update_step_info'])->middleware('can:update_step_info,App\Models\Applicationn')->name('case.update_step_info');
        // Route::get('/case/delete-addmember-info/{id?}/{sid?}', ['as'=>'case.delete_addmember_info',CaseController::class, 'delete_addmember_info'])->middleware('can:delete_addmember_info,App\Models\Applicationn')->name('case.delete_addmember_info');
        // Route::get('/case/edit-addmember-info/{id?}', ['as'=>'case.edit_addmember_info',CaseController::class, 'edit_addmember_info'])->middleware('can:edit_addmember_info,App\Models\Applicationn')->name('case.edit_addmember_info');
        // Route::put('/case/update-addmember-info/{id?}', ['as'=>'case.update_addmember_info',CaseController::class, 'update_addmember_info'])->middleware('can:update_addmember_info,App\Models\Applicationn')->name('case.update_addmember_info');
        // Route::get('/case/show/{id?}', ['as'=>'case.show',CaseController::class, 'show'])->middleware('can:show,App\Models\Applicationn')->name('case.show');



    });


    Route::group(['prefix'=>'cases'], function(){

        //Casepending route
        Route::get('/casepending/{cid?}', ['as'=>'casepending',CasependingController::class, 'index'])->middleware('can:read,App\Models\Casepending')->name('casepending');
        Route::get('/casepending/create', ['as'=>'casepending.create',CasependingController::class, 'create'])->middleware('can:create,App\Models\Casepending')->name('casepending.create');
        Route::post('/casepending/store', ['as'=>'casepending.store',CasependingController::class, 'store'])->middleware('can:create,App\Models\Casepending')->name('casepending.store');
        Route::get('/casepending/edit/{id?}', ['as'=>'casepending.edit',CasependingController::class, 'edit'])->middleware('can:update,App\Models\Casepending')->name('casepending.edit');
        Route::put('/casepending/update/{id?}', ['as'=>'casepending.update',CasependingController::class, 'update'])->middleware('can:update,App\Models\Casepending')->name('casepending.update');
        Route::get('/casepending/delete/{id?}/{sid?}', ['as'=>'casepending.delete',CasependingController::class, 'delete'])->middleware('can:delete,App\Models\Casepending')->name('casepending.delete');
        Route::get('/casepending-file/delete/{id?}/{sid?}', ['as'=>'casepending_file.delete',CasependingController::class, 'delete_file'])->middleware('can:delete_single_file,App\Models\Casepending')->name('casepending_file.delete');
        Route::get('/casepending/delete-suspicious-info/{id?}/{sid?}', ['as'=>'casepending.delete_suspicious_info',CasependingController::class, 'delete_suspicious_info'])->middleware('can:delete_suspicious_info,App\Models\Casepending')->name('casepending.delete_suspicious_info');
        Route::get('/casepending/edit-suspicious-info/{id?}', ['as'=>'casepending.edit_suspicious_info',CasependingController::class, 'edit_suspicious_info'])->middleware('can:edit_suspicious_info,App\Models\Casepending')->name('casepending.edit_suspicious_info');
        Route::put('/casepending/update-suspicious-info/{id?}', ['as'=>'casepending.update_suspicious_info',CasependingController::class, 'update_suspicious_info'])->middleware('can:update_suspicious_info,App\Models\Casepending')->name('casepending.update_suspicious_info');
        Route::get('/casepending/delete-step-info/{id?}/{sid?}', ['as'=>'casepending.delete_step_info',CasependingController::class, 'delete_step_info'])->middleware('can:delete_step_info,App\Models\Casepending')->name('casepending.delete_step_info');
        Route::get('/casepending/edit-step-info/{id?}', ['as'=>'casepending.edit_step_info',CasependingController::class, 'edit_step_info'])->middleware('can:edit_step_info,App\Models\Casepending')->name('casepending.edit_step_info');
        Route::put('/casepending/update-step-info/{id?}', ['as'=>'casepending.update_step_info',CasependingController::class, 'update_step_info'])->middleware('can:update_step_info,App\Models\Casepending')->name('casepending.update_step_info');
        Route::get('/casepending/delete-addmember-info/{id?}/{sid?}', ['as'=>'casepending.delete_addmember_info',CasependingController::class, 'delete_addmember_info'])->middleware('can:delete_addmember_info,App\Models\Casepending')->name('casepending.delete_addmember_info');
        Route::get('/casepending/edit-addmember-info/{id?}', ['as'=>'casepending.edit_addmember_info',CasependingController::class, 'edit_addmember_info'])->middleware('can:edit_addmember_info,App\Models\Casepending')->name('casepending.edit_addmember_info');
        Route::put('/casepending/update-addmember-info/{id?}', ['as'=>'casepending.update_addmember_info',CasependingController::class, 'update_addmember_info'])->middleware('can:update_addmember_info,App\Models\Casepending')->name('casepending.update_addmember_info');
        Route::get('/casepending/show/{id?}', ['as'=>'casepending.show',CasependingController::class, 'show'])->middleware('can:show,App\Models\Casepending')->name('casepending.show');
        Route::put('/casepending/update-feedback-info/{id?}', ['as'=>'casepending.update_feedback_info',CasependingController::class, 'update_feedback_info'])->middleware('can:update_feedback_info,App\Models\Casepending')->name('casepending.update_feedback_info');
        
        Route::get('/casepending/pdf-case-info/{id?}', ['as'=>'casepending.pdf_case_info',CasependingController::class, 'pdf_case_info'])->middleware('can:pdf_case_info,App\Models\Casepending')->name('casepending.pdf_case_info');
        Route::get('/casepending/pdf-victim-info/{id?}', ['as'=>'casepending.pdf_victim_info',CasependingController::class, 'pdf_victim_info'])->middleware('can:pdf_victim_info,App\Models\Casepending')->name('casepending.pdf_victim_info');
        Route::get('/casepending/pdf-suspicious-info/{id?}', ['as'=>'casepending.pdf_suspicious_info',CasependingController::class, 'pdf_suspicious_info'])->middleware('can:pdf_suspicious_info,App\Models\Casepending')->name('casepending.pdf_suspicious_info');
        Route::get('/casepending/case-status-change/{appication_id?}/{case_status_id?}', ['as'=>'casepending.case_status_change',CasependingController::class, 'case_status_change'])->middleware('can:update_step_info,App\Models\Casepending')->name('casepending.case_status_change');


        //Caseongoing route
        Route::get('/caseongoing/{cid?}', ['as'=>'caseongoing',CaseongoingController::class, 'index'])->middleware('can:read,App\Models\Caseongoing')->name('caseongoing');
        Route::get('/caseongoing/create', ['as'=>'caseongoing.create',CaseongoingController::class, 'create'])->middleware('can:create,App\Models\Caseongoing')->name('caseongoing.create');
        Route::post('/caseongoing/store', ['as'=>'caseongoing.store',CaseongoingController::class, 'store'])->middleware('can:create,App\Models\Caseongoing')->name('caseongoing.store');
        Route::get('/caseongoing/edit/{id?}', ['as'=>'caseongoing.edit',CaseongoingController::class, 'edit'])->middleware('can:update,App\Models\Caseongoing')->name('caseongoing.edit');
        Route::put('/caseongoing/update/{id?}', ['as'=>'caseongoing.update',CaseongoingController::class, 'update'])->middleware('can:update,App\Models\Caseongoing')->name('caseongoing.update');
        Route::get('/caseongoing/delete/{id?}/{sid?}', ['as'=>'caseongoing.delete',CaseongoingController::class, 'delete'])->middleware('can:delete,App\Models\Caseongoing')->name('caseongoing.delete');
        Route::get('/caseongoing-file/delete/{id?}/{sid?}', ['as'=>'caseongoing_file.delete',CaseongoingController::class, 'delete_file'])->middleware('can:delete_single_file,App\Models\Caseongoing')->name('caseongoing_file.delete');
        Route::get('/caseongoing/delete-suspicious-info/{id?}/{sid?}', ['as'=>'caseongoing.delete_suspicious_info',CaseongoingController::class, 'delete_suspicious_info'])->middleware('can:delete_suspicious_info,App\Models\Caseongoing')->name('caseongoing.delete_suspicious_info');
        Route::get('/caseongoing/edit-suspicious-info/{id?}', ['as'=>'caseongoing.edit_suspicious_info',CaseongoingController::class, 'edit_suspicious_info'])->middleware('can:edit_suspicious_info,App\Models\Caseongoing')->name('caseongoing.edit_suspicious_info');
        Route::put('/caseongoing/update-suspicious-info/{id?}', ['as'=>'caseongoing.update_suspicious_info',CaseongoingController::class, 'update_suspicious_info'])->middleware('can:update_suspicious_info,App\Models\Caseongoing')->name('caseongoing.update_suspicious_info');
        Route::get('/caseongoing/delete-step-info/{id?}/{sid?}', ['as'=>'caseongoing.delete_step_info',CaseongoingController::class, 'delete_step_info'])->middleware('can:delete_step_info,App\Models\Caseongoing')->name('caseongoing.delete_step_info');
        Route::get('/caseongoing/edit-step-info/{id?}', ['as'=>'caseongoing.edit_step_info',CaseongoingController::class, 'edit_step_info'])->middleware('can:edit_step_info,App\Models\Caseongoing')->name('caseongoing.edit_step_info');
        Route::put('/caseongoing/update-step-info/{id?}', ['as'=>'caseongoing.update_step_info',CaseongoingController::class, 'update_step_info'])->middleware('can:update_step_info,App\Models\Caseongoing')->name('caseongoing.update_step_info');
        Route::get('/caseongoing/delete-addmember-info/{id?}/{sid?}', ['as'=>'caseongoing.delete_addmember_info',CaseongoingController::class, 'delete_addmember_info'])->middleware('can:delete_addmember_info,App\Models\Caseongoing')->name('caseongoing.delete_addmember_info');
        Route::get('/caseongoing/edit-addmember-info/{id?}', ['as'=>'caseongoing.edit_addmember_info',CaseongoingController::class, 'edit_addmember_info'])->middleware('can:edit_addmember_info,App\Models\Caseongoing')->name('caseongoing.edit_addmember_info');
        Route::put('/caseongoing/update-addmember-info/{id?}', ['as'=>'caseongoing.update_addmember_info',CaseongoingController::class, 'update_addmember_info'])->middleware('can:update_addmember_info,App\Models\Caseongoing')->name('caseongoing.update_addmember_info');
        Route::get('/caseongoing/show/{id?}', ['as'=>'caseongoing.show',CaseongoingController::class, 'show'])->middleware('can:show,App\Models\Caseongoing')->name('caseongoing.show');
        Route::put('/caseongoing/update-feedback-info/{id?}', ['as'=>'caseongoing.update_feedback_info',CaseongoingController::class, 'update_feedback_info'])->middleware('can:update_feedback_info,App\Models\Caseongoing')->name('caseongoing.update_feedback_info');
    
        Route::get('/caseongoing/pdf-case-info/{id?}', ['as'=>'caseongoing.pdf_case_info',CaseongoingController::class, 'pdf_case_info'])->middleware('can:pdf_case_info,App\Models\Caseongoing')->name('caseongoing.pdf_case_info');
        Route::get('/caseongoing/pdf-victim-info/{id?}', ['as'=>'caseongoing.pdf_victim_info',CaseongoingController::class, 'pdf_victim_info'])->middleware('can:pdf_victim_info,App\Models\Caseongoing')->name('caseongoing.pdf_victim_info');
        Route::get('/caseongoing/pdf-suspicious-info/{id?}', ['as'=>'caseongoing.pdf_suspicious_info',CaseongoingController::class, 'pdf_suspicious_info'])->middleware('can:pdf_suspicious_info,App\Models\Caseongoing')->name('caseongoing.pdf_suspicious_info');

        Route::get('/caseongoing/case-status-change/{appication_id?}/{case_status_id?}', ['as'=>'caseongoing.case_status_change',CaseongoingController::class, 'case_status_change'])->middleware('can:update_step_info,App\Models\Caseongoing')->name('caseongoing.case_status_change');

        //Casedeclined route
        Route::get('/casedeclined/{cid?}', ['as'=>'casedeclined',CasedeclinedController::class, 'index'])->middleware('can:read,App\Models\Casedeclined')->name('casedeclined');
        Route::get('/casedeclined/create', ['as'=>'casedeclined.create',CasedeclinedController::class, 'create'])->middleware('can:create,App\Models\Casedeclined')->name('casedeclined.create');
        Route::post('/casedeclined/store', ['as'=>'casedeclined.store',CasedeclinedController::class, 'store'])->middleware('can:create,App\Models\Casedeclined')->name('casedeclined.store');
        Route::get('/casedeclined/edit/{id?}', ['as'=>'casedeclined.edit',CasedeclinedController::class, 'edit'])->middleware('can:update,App\Models\Casedeclined')->name('casedeclined.edit');
        Route::put('/casedeclined/update/{id?}', ['as'=>'casedeclined.update',CasedeclinedController::class, 'update'])->middleware('can:update,App\Models\Casedeclined')->name('casedeclined.update');
        Route::get('/casedeclined/delete/{id?}/{sid?}', ['as'=>'casedeclined.delete',CasedeclinedController::class, 'delete'])->middleware('can:delete,App\Models\Casedeclined')->name('casedeclined.delete');
        Route::get('/casedeclined-file/delete/{id?}/{sid?}', ['as'=>'casedeclined_file.delete',CasedeclinedController::class, 'delete_file'])->middleware('can:delete_single_file,App\Models\Casedeclined')->name('casedeclined_file.delete');
        Route::get('/casedeclined/delete-suspicious-info/{id?}/{sid?}', ['as'=>'casedeclined.delete_suspicious_info',CasedeclinedController::class, 'delete_suspicious_info'])->middleware('can:delete_suspicious_info,App\Models\Casedeclined')->name('casedeclined.delete_suspicious_info');
        Route::get('/casedeclined/edit-suspicious-info/{id?}', ['as'=>'casedeclined.edit_suspicious_info',CasedeclinedController::class, 'edit_suspicious_info'])->middleware('can:edit_suspicious_info,App\Models\Casedeclined')->name('casedeclined.edit_suspicious_info');
        Route::put('/casedeclined/update-suspicious-info/{id?}', ['as'=>'casedeclined.update_suspicious_info',CasedeclinedController::class, 'update_suspicious_info'])->middleware('can:update_suspicious_info,App\Models\Casedeclined')->name('casedeclined.update_suspicious_info');
        Route::get('/casedeclined/delete-step-info/{id?}/{sid?}', ['as'=>'casedeclined.delete_step_info',CasedeclinedController::class, 'delete_step_info'])->middleware('can:delete_step_info,App\Models\Casedeclined')->name('casedeclined.delete_step_info');
        Route::get('/casedeclined/edit-step-info/{id?}', ['as'=>'casedeclined.edit_step_info',CasedeclinedController::class, 'edit_step_info'])->middleware('can:edit_step_info,App\Models\Casedeclined')->name('casedeclined.edit_step_info');
        Route::put('/casedeclined/update-step-info/{id?}', ['as'=>'casedeclined.update_step_info',CasedeclinedController::class, 'update_step_info'])->middleware('can:update_step_info,App\Models\Casedeclined')->name('casedeclined.update_step_info');
        Route::get('/casedeclined/delete-addmember-info/{id?}/{sid?}', ['as'=>'casedeclined.delete_addmember_info',CasedeclinedController::class, 'delete_addmember_info'])->middleware('can:delete_addmember_info,App\Models\Casedeclined')->name('casedeclined.delete_addmember_info');
        Route::get('/casedeclined/edit-addmember-info/{id?}', ['as'=>'casedeclined.edit_addmember_info',CasedeclinedController::class, 'edit_addmember_info'])->middleware('can:edit_addmember_info,App\Models\Casedeclined')->name('casedeclined.edit_addmember_info');
        Route::put('/casedeclined/update-addmember-info/{id?}', ['as'=>'casedeclined.update_addmember_info',CasedeclinedController::class, 'update_addmember_info'])->middleware('can:update_addmember_info,App\Models\Casedeclined')->name('casedeclined.update_addmember_info');
        Route::get('/casedeclined/show/{id?}', ['as'=>'casedeclined.show',CasedeclinedController::class, 'show'])->middleware('can:show,App\Models\Casedeclined')->name('casedeclined.show');
        Route::put('/casedeclined/update-feedback-info/{id?}', ['as'=>'casedeclined.update_feedback_info',CasedeclinedController::class, 'update_feedback_info'])->middleware('can:update_feedback_info,App\Models\Casedeclined')->name('casedeclined.update_feedback_info');
    

        Route::get('/casedeclined/pdf-case-info/{id?}', ['as'=>'casedeclined.pdf_case_info',CasedeclinedController::class, 'pdf_case_info'])->middleware('can:pdf_case_info,App\Models\Casedeclined')->name('casedeclined.pdf_case_info');
        Route::get('/casedeclined/pdf-victim-info/{id?}', ['as'=>'casedeclined.pdf_victim_info',CasedeclinedController::class, 'pdf_victim_info'])->middleware('can:pdf_victim_info,App\Models\Casedeclined')->name('casedeclined.pdf_victim_info');
        Route::get('/casedeclined/pdf-suspicious-info/{id?}', ['as'=>'casedeclined.pdf_suspicious_info',CasedeclinedController::class, 'pdf_suspicious_info'])->middleware('can:pdf_suspicious_info,App\Models\Casedeclined')->name('casedeclined.pdf_suspicious_info');

        Route::get('/casedeclined/case-status-change/{appication_id?}/{case_status_id?}', ['as'=>'casedeclined.case_status_change',CasedeclinedController::class, 'case_status_change'])->middleware('can:update_step_info,App\Models\Casedeclined')->name('casedeclined.update_step_info');

        //Caseincomplete route
        Route::get('/caseincomplete/{cid?}', ['as'=>'caseincomplete',CaseincompleteController::class, 'index'])->middleware('can:read,App\Models\Caseincomplete')->name('caseincomplete');
        Route::get('/caseincomplete/create', ['as'=>'caseincomplete.create',CaseincompleteController::class, 'create'])->middleware('can:create,App\Models\Caseincomplete')->name('caseincomplete.create');
        Route::post('/caseincomplete/store', ['as'=>'caseincomplete.store',CaseincompleteController::class, 'store'])->middleware('can:create,App\Models\Caseincomplete')->name('caseincomplete.store');
        Route::get('/caseincomplete/edit/{id?}', ['as'=>'caseincomplete.edit',CaseincompleteController::class, 'edit'])->middleware('can:update,App\Models\Caseincomplete')->name('caseincomplete.edit');
        Route::put('/caseincomplete/update/{id?}', ['as'=>'caseincomplete.update',CaseincompleteController::class, 'update'])->middleware('can:update,App\Models\Caseincomplete')->name('caseincomplete.update');
        Route::get('/caseincomplete/delete/{id?}/{sid?}', ['as'=>'caseincomplete.delete',CaseincompleteController::class, 'delete'])->middleware('can:delete,App\Models\Caseincomplete')->name('caseincomplete.delete');
        Route::get('/caseincomplete-file/delete/{id?}/{sid?}', ['as'=>'caseincomplete_file.delete',CaseincompleteController::class, 'delete_file'])->middleware('can:delete_single_file,App\Models\Caseincomplete')->name('caseincomplete_file.delete');
        Route::get('/caseincomplete/delete-suspicious-info/{id?}/{sid?}', ['as'=>'caseincomplete.delete_suspicious_info',CaseincompleteController::class, 'delete_suspicious_info'])->middleware('can:delete_suspicious_info,App\Models\Caseincomplete')->name('caseincomplete.delete_suspicious_info');
        Route::get('/caseincomplete/edit-suspicious-info/{id?}', ['as'=>'caseincomplete.edit_suspicious_info',CaseincompleteController::class, 'edit_suspicious_info'])->middleware('can:edit_suspicious_info,App\Models\Caseincomplete')->name('caseincomplete.edit_suspicious_info');
        Route::put('/caseincomplete/update-suspicious-info/{id?}', ['as'=>'caseincomplete.update_suspicious_info',CaseincompleteController::class, 'update_suspicious_info'])->middleware('can:update_suspicious_info,App\Models\Caseincomplete')->name('caseincomplete.update_suspicious_info');
        Route::get('/caseincomplete/delete-step-info/{id?}/{sid?}', ['as'=>'caseincomplete.delete_step_info',CaseincompleteController::class, 'delete_step_info'])->middleware('can:delete_step_info,App\Models\Caseincomplete')->name('caseincomplete.delete_step_info');
        Route::get('/caseincomplete/edit-step-info/{id?}', ['as'=>'caseincomplete.edit_step_info',CaseincompleteController::class, 'edit_step_info'])->middleware('can:edit_step_info,App\Models\Caseincomplete')->name('caseincomplete.edit_step_info');
        Route::put('/caseincomplete/update-step-info/{id?}', ['as'=>'caseincomplete.update_step_info',CaseincompleteController::class, 'update_step_info'])->middleware('can:update_step_info,App\Models\Caseincomplete')->name('caseincomplete.update_step_info');
        Route::get('/caseincomplete/delete-addmember-info/{id?}/{sid?}', ['as'=>'caseincomplete.delete_addmember_info',CaseincompleteController::class, 'delete_addmember_info'])->middleware('can:delete_addmember_info,App\Models\Caseincomplete')->name('caseincomplete.delete_addmember_info');
        Route::get('/caseincomplete/edit-addmember-info/{id?}', ['as'=>'caseincomplete.edit_addmember_info',CaseincompleteController::class, 'edit_addmember_info'])->middleware('can:edit_addmember_info,App\Models\Caseincomplete')->name('caseincomplete.edit_addmember_info');
        Route::put('/caseincomplete/update-addmember-info/{id?}', ['as'=>'caseincomplete.update_addmember_info',CaseincompleteController::class, 'update_addmember_info'])->middleware('can:update_addmember_info,App\Models\Caseincomplete')->name('caseincomplete.update_addmember_info');
        Route::get('/caseincomplete/show/{id?}', ['as'=>'caseincomplete.show',CaseincompleteController::class, 'show'])->middleware('can:show,App\Models\Caseincomplete')->name('caseincomplete.show');
        Route::put('/caseincomplete/update-feedback-info/{id?}', ['as'=>'caseincomplete.update_feedback_info',CaseincompleteController::class, 'update_feedback_info'])->middleware('can:update_feedback_info,App\Models\Caseincomplete')->name('caseincomplete.update_feedback_info');

        Route::get('/caseincomplete/pdf-case-info/{id?}', ['as'=>'caseincomplete.pdf_case_info',CaseincompleteController::class, 'pdf_case_info'])->middleware('can:pdf_case_info,App\Models\Caseincomplete')->name('caseincomplete.pdf_case_info');
        Route::get('/caseincomplete/pdf-victim-info/{id?}', ['as'=>'caseincomplete.pdf_victim_info',CaseincompleteController::class, 'pdf_victim_info'])->middleware('can:pdf_victim_info,App\Models\Caseincomplete')->name('caseincomplete.pdf_victim_info');
        Route::get('/caseincomplete/pdf-suspicious-info/{id?}', ['as'=>'caseincomplete.pdf_suspicious_info',CaseincompleteController::class, 'pdf_suspicious_info'])->middleware('can:pdf_suspicious_info,App\Models\Caseincomplete')->name('caseincomplete.pdf_suspicious_info');
        Route::get('/caseincomplete/case-status-change/{appication_id?}/{case_status_id?}', ['as'=>'caseincomplete.case_status_change',CaseincompleteController::class, 'case_status_change'])->middleware('can:update_step_info,App\Models\Caseincomplete')->name('caseincomplete.update_step_info');
        //Casecomplete route
        Route::get('/casecomplete/{cid?}', ['as'=>'casecomplete',CasecompleteController::class, 'index'])->middleware('can:read,App\Models\Casecomplete')->name('casecomplete');
        Route::get('/casecomplete/create', ['as'=>'casecomplete.create',CasecompleteController::class, 'create'])->middleware('can:create,App\Models\Casecomplete')->name('casecomplete.create');
        Route::post('/casecomplete/store', ['as'=>'casecomplete.store',CasecompleteController::class, 'store'])->middleware('can:create,App\Models\Casecomplete')->name('casecomplete.store');
        Route::get('/casecomplete/edit/{id?}', ['as'=>'casecomplete.edit',CasecompleteController::class, 'edit'])->middleware('can:update,App\Models\Casecomplete')->name('casecomplete.edit');
        Route::put('/casecomplete/update/{id?}', ['as'=>'casecomplete.update',CasecompleteController::class, 'update'])->middleware('can:update,App\Models\Casecomplete')->name('casecomplete.update');
        Route::get('/casecomplete/delete/{id?}/{sid?}', ['as'=>'casecomplete.delete',CasecompleteController::class, 'delete'])->middleware('can:delete,App\Models\Casecomplete')->name('casecomplete.delete');
        Route::get('/casecomplete-file/delete/{id?}/{sid?}', ['as'=>'casecomplete_file.delete',CasecompleteController::class, 'delete_file'])->middleware('can:delete_single_file,App\Models\Casecomplete')->name('casecomplete_file.delete');
        Route::get('/casecomplete/delete-suspicious-info/{id?}/{sid?}', ['as'=>'casecomplete.delete_suspicious_info',CasecompleteController::class, 'delete_suspicious_info'])->middleware('can:delete_suspicious_info,App\Models\Casecomplete')->name('casecomplete.delete_suspicious_info');
        Route::get('/casecomplete/edit-suspicious-info/{id?}', ['as'=>'casecomplete.edit_suspicious_info',CasecompleteController::class, 'edit_suspicious_info'])->middleware('can:edit_suspicious_info,App\Models\Casecomplete')->name('casecomplete.edit_suspicious_info');
        Route::put('/casecomplete/update-suspicious-info/{id?}', ['as'=>'casecomplete.update_suspicious_info',CasecompleteController::class, 'update_suspicious_info'])->middleware('can:update_suspicious_info,App\Models\Casecomplete')->name('casecomplete.update_suspicious_info');
        Route::get('/casecomplete/delete-step-info/{id?}/{sid?}', ['as'=>'casecomplete.delete_step_info',CasecompleteController::class, 'delete_step_info'])->middleware('can:delete_step_info,App\Models\Casecomplete')->name('casecomplete.delete_step_info');
        Route::get('/casecomplete/edit-step-info/{id?}', ['as'=>'casecomplete.edit_step_info',CasecompleteController::class, 'edit_step_info'])->middleware('can:edit_step_info,App\Models\Casecomplete')->name('casecomplete.edit_step_info');
        Route::put('/casecomplete/update-step-info/{id?}', ['as'=>'casecomplete.update_step_info',CasecompleteController::class, 'update_step_info'])->middleware('can:update_step_info,App\Models\Casecomplete')->name('casecomplete.update_step_info');
        Route::get('/casecomplete/delete-addmember-info/{id?}/{sid?}', ['as'=>'casecomplete.delete_addmember_info',CasecompleteController::class, 'delete_addmember_info'])->middleware('can:delete_addmember_info,App\Models\Casecomplete')->name('casecomplete.delete_addmember_info');
        Route::get('/casecomplete/edit-addmember-info/{id?}', ['as'=>'casecomplete.edit_addmember_info',CasecompleteController::class, 'edit_addmember_info'])->middleware('can:edit_addmember_info,App\Models\Casecomplete')->name('casecomplete.edit_addmember_info');
        Route::put('/casecomplete/update-addmember-info/{id?}', ['as'=>'casecomplete.update_addmember_info',CasecompleteController::class, 'update_addmember_info'])->middleware('can:update_addmember_info,App\Models\Casecomplete')->name('casecomplete.update_addmember_info');
        Route::get('/casecomplete/show/{id?}', ['as'=>'casecomplete.show',CasecompleteController::class, 'show'])->middleware('can:show,App\Models\Casecomplete')->name('casecomplete.show');
        Route::put('/casecomplete/update-feedback-info/{id?}', ['as'=>'casecomplete.update_feedback_info',CasecompleteController::class, 'update_feedback_info'])->middleware('can:update_feedback_info,App\Models\Casecomplete')->name('casecomplete.update_feedback_info');

        Route::get('/casecomplete/pdf-case-info/{id?}', ['as'=>'casecomplete.pdf_case_info',CasecompleteController::class, 'pdf_case_info'])->middleware('can:pdf_case_info,App\Models\Casecomplete')->name('casecomplete.pdf_case_info');
        Route::get('/casecomplete/pdf-victim-info/{id?}', ['as'=>'casecomplete.pdf_victim_info',CasecompleteController::class, 'pdf_victim_info'])->middleware('can:pdf_victim_info,App\Models\Casecomplete')->name('casecomplete.pdf_victim_info');
        Route::get('/casecomplete/pdf-suspicious-info/{id?}', ['as'=>'casecomplete.pdf_suspicious_info',CasecompleteController::class, 'pdf_suspicious_info'])->middleware('can:pdf_suspicious_info,App\Models\Casecomplete')->name('casecomplete.pdf_suspicious_info');
        Route::get('/casecomplete/case-status-change/{appication_id?}/{case_status_id?}', ['as'=>'casecomplete.case_status_change',CasecompleteController::class, 'case_status_change'])->middleware('can:update_step_info,App\Models\Casecomplete')->name('casecomplete.update_step_info');
    });

});
