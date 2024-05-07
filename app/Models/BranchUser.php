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

class BranchUser extends Authenticatable
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
    const MinistryPanel = 3;
    const SecretaryPanel = 4;
    const EmbassySuperAdmin = 5;
    const EmbassyAdmin = 6;
    const EmbassyManager = 7;
    const EmbassyOperator = 8;
    const ESCSuperAdmin = 9;
    const ESCAdmin = 10;
    const ESCOperator = 11;


    const DEFAULT_ROLE = [
        '1' => 'Master Admin Type',
        '2' => 'System Admin Type',
        '3' => 'Ministry Panel',
        '4' => 'Secretary Panel',
        '5' => 'Embassy Super Admin',
        '6' => 'Embassy Admin',
        '7' => 'Embassy Manager',
        '8' => 'Embassy Operator',
        '9' => 'ESC Super Admin',
        '10' => 'ESC Admin',
        '11' => 'ESC Operator'
    ];

    const DEFAULT_ROLE_LIST = [0,1,2,3,4,5,6,7,8,9,10,11];



    protected $table = "admins";
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

    # UserTypeWiseData
    public function scopeUtwd($query) {

        $authUser = Auth::guard('admin')->user()->load(['userType']);
        
        if($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[11]){
            return $query->where(['user_type_id'=>$authUser->userType->default_role])->where(['area_id'=>$authUser->area_id,'branch_id'=>$authUser->branch_id]);
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[10]){
            return $query->where('user_type_id','>=',$authUser->userType->default_role)->where(['area_id'=>$authUser->area_id,'branch_id'=>$authUser->branch_id]);
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[9]){
            return $query->where('user_type_id','>=',$authUser->userType->default_role)->where(['area_id'=>$authUser->area_id,'branch_id'=>$authUser->branch_id]);
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[8]){
            return $query->where('user_type_id','>=',$authUser->userType->default_role)->where(['area_id'=>$authUser->area_id]);
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[7]){
            return $query->where('user_type_id','>=',$authUser->userType->default_role)->where(['area_id'=>$authUser->area_id]);
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[6]){
            return $query->where('user_type_id','>=',$authUser->userType->default_role)->where(['area_id'=>$authUser->area_id]);
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[5]){
            return $query->where('user_type_id','>=',$authUser->userType->default_role)->where(['area_id'=>$authUser->area_id]);
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[4]){
            return $query->where('user_type_id','>=',$authUser->userType->default_role);
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[3]){
            return $query->where('user_type_id','>=',$authUser->userType->default_role);
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[2]){
            return $query->where('user_type_id','>=',$authUser->userType->default_role);
        } else{
            return $query;
        }

        return $query;
    }
}
