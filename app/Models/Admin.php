<?php

namespace App\Models;

use App\Scopes\StatusScope;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;

use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];


    const MasterAdminType = 1;
    const SystemAdminType = 2;
    const AdminType = 3;
    const CenterCommittee = 4;
    const WalkingGroup = 5;
    const DistrictCommittee = 6;
    const UpazilaCommittee = 7;
    const EmbassyManager = 8;
    const EmbassyOperator = 9;

    const Draft = 1;
    const Pending = 2;
    const Declined = 3;
    const Ongoing = 4;
    const Incomplete = 5;
    const Complete = 6;

    const CentralMemberSecretary = 10;


    const DEFAULT_ROLE = [
        '1' => 'Master Admin Type',
        '2' => 'System Admin Type',
        '3' => 'Admin Type',
        '4' => 'Central Committee',
        '5' => 'Walking Group',
        '6' => 'District Committee',
        '7' => 'Upazila Committee',
        '8' => 'Volunteer',
        '9' => 'Operator',
    ];

    const DEFAULT_ROLE_LIST = [0,1,2,3,4,5,6,7,8,9];



    protected $guarded = ['id'];

    protected static $recordEvents = ['updated','deleted'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('admins')
        ->logAll()
        //->logOnly(['name'])
        ->setDescriptionForEvent(fn(string $eventName) => $eventName)
        //->dontLogIfAttributesChangedOnly(['sort'])
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //'status' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    public function getStatusAttribute($value)
    {
        return $status = (app()->getLocale() == 'en') ? Status::EN[$value] : Status::BN[$value];
    }

    // public function scopeActive($query)
    // {
    //     return $query->where('status',1);
    // }


    //Admin::withoutGlobalScopes([FirstScope::class, SecondScope::class])->get();

    protected static function booted()
    {
        static::addGlobalScope(new StatusScope);
    }

    public function branch() {
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function role() {
        return $this->belongsTo(Role::class,'role_id');
    }

    public function userType() {
        return $this->belongsTo(UserType::class,'user_type_id');
    }

    public function association() {
        return $this->belongsTo(Association::class,'association_id');
    }

    public function area() {
        return $this->belongsTo(Area::class,'area_id');
    }

    public function scopeOffice($query, $UT_ID) {
        return $query->where('user_type_id',$UT_ID);
    }


    public function division() {
        return $this->belongsTo(Division::class,'division_id');
    }

    public function district() {
        return $this->belongsTo(District::class,'district_id');
    }

    public function upazila() {
        return $this->belongsTo(Upazila::class,'upazila_id');
    }

    public function thana() {
        return $this->belongsTo(Thana::class,'thana_id');
    }

    public function designation() {
        return $this->belongsTo(Designation::class,'designation_id');
    }

    public function officeDesignation() {
        return $this->belongsTo(OfficeDesignation::class,'office_designation_id');
    }

    # UserTypeWiseData
    public function scopeUtwd($query) {

        $authUser = Auth::guard('admin')->user()->load(['userType']);
        
        if($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[9]){
            return $query->where('user_type_id','>=',$authUser->userType->default_role)->where(['created_by_id'=>$authUser->created_by_id]);
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[8]){
            return $query->where('user_type_id','>=',$authUser->userType->default_role)->where(['created_by_id'=>$authUser->created_by_id]);
        }elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[7]){
            return $query->where('user_type_id','>=',$authUser->userType->default_role)->where(['upazila_id'=>$authUser->upazila_id]);
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[6]){
            return $query->where('user_type_id','>=',$authUser->userType->default_role)->where(['district_id'=>$authUser->district_id]);
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[5]){
            return $query->where('user_type_id','>=',$authUser->userType->default_role)->where(['district_id'=>$authUser->district_id]);
        } else{
            return $query;
        }

        return $query;
    }
    
    
    // Location user type wise data
    public function scopeUtwdr($query) {
        // $authUser = Auth::guard('admin')->user()->load(['userType']);
        
        // if($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[8]){
        //     return $query->where(['id' => $authUser->id]);
        // }
        // elseif($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[7]){
        //     return $query->where(['branch_id' => $authUser->branch_id, 'user_type_id' => self::CA]);
        // }
        // elseif($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[6]){
        //     return $query->where(['branch_id' => $authUser->branch_id, 'user_type_id' => self::VP]);
        // }
        // elseif($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[5]){
        //     return $query->where(['area_id' => $authUser->area_id, 'user_type_id' => self::P]);
        // }
        // elseif($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[4]){
        //     return $query->where(['association_id' => $authUser->association_id, 'user_type_id' => self::HA]);
        // }
        // elseif($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[3]){
        //     return $query->where(['user_type_id' => self::AD]);
        // }
        // elseif($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[2]){
        //     return $query;
        // }
        // else{
        //     return $query;
        // }

        return $query;
    }

    // Location user type wise data
    
    
    
    // public function scopeUtwdr($query) {

    //     $authUser = Auth::guard('admin')->user()->load(['userType']);
        
    //     if($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[5]){
    //         return $query->where(['id' => $authUser->id]);
    //     } elseif($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[4]){
    //         return $query->where(['branch_id' => $authUser->branch_id]);
    //     } elseif($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[3]){
    //         return $query->where(['user_type_id' => self::AD]);
    //     } elseif($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[2]){
    //         return $query;
    //     } else{
    //         return $query;
    //     }
    // }

    // // Location user type wise beat office data
    // public function scopeLutwbod($query) {

    //     $authUser = Auth::guard('admin')->user()->load(['userType']);
        
    //     if($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[5]){
    //         return $query->where(['id' => $authUser->id]);
    //     } elseif($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[4]){
    //         return $query->where(['branch_id' => $authUser->branch_id, 'user_type_id' => self::MGR]);
    //     } elseif($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[3]){
    //         return $query->where(['user_type_id' => self::AD]);
    //     } elseif($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[2]){
    //         return $query;
    //     } else{
    //         return $query;
    //     }
    // }

    // // User type wise validation
    // public static function Utwv($request) {

    //     $authUser = Auth::guard('admin')->user()->load(['userType']);
        
    //     if($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[6]){
    //         return $validator = Validator::make($request->all(), [
    //             'state_id' => 'required',
    //             'division_id' => 'required',
    //             'district_id' => 'required',
    //             'upazila_id' => 'required',
    //         ]);
    //     } elseif($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[5]){
    //         return $validator = Validator::make($request->all(), [
    //             'state_id' => 'required',
    //             'division_id' => 'required',
    //             'district_id' => 'required',
    //             //'upazila_id' => 'required',
    //         ]);
    //     } elseif($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[4]){
    //         return $validator = Validator::make($request->all(), [
    //             'state_id' => 'required',
    //             'division_id' => 'required',
    //             //'district_id' => 'required',
    //             //'upazila_id' => 'required',
    //         ]);
    //     } elseif($authUser->userType->default_role == self::DEFAULT_ROLE_LIST[3]){
    //         return $validator = Validator::make($request->all(), [
    //             'state_id' => 'required',
    //             'district_id' => 'required',
    //             //'upazila_id' => 'required',
    //         ]);
    //     } else{
    //         return $validator = Validator::make($request->all(), [
    //             'state_id' => 'required',
    //             'division_id' => 'required',
    //         ]);
    //     }
    // }
}
