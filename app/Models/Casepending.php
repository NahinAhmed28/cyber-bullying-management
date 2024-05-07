<?php

namespace App\Models;

use App\Scopes\StatusScope;
use Illuminate\Support\Str;

use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Casepending extends Model
{
    use HasFactory, LogsActivity;
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $table = 'applications';

    protected static $recordEvents = ['updated','deleted'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('applications')
        ->logAll()
        //->logOnly(['name'])
        ->setDescriptionForEvent(fn(string $eventName) => $eventName)
        //->dontLogIfAttributesChangedOnly(['sort'])
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }

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

    public function association() {
        return $this->belongsTo(Association::class,'association_id');
    }

    public function area() {
        return $this->belongsTo(Area::class,'area_id');
    }

    public function branch() {
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function category() {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function service() {
        return $this->belongsTo(Service::class,'service_id');
    }

    public function serviceType() {
        return $this->belongsTo(ServiceType::class,'service_type_id');
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function file() {
        return $this->hasMany(File::class,'application_id','id');
    }

    public function suspect() {
        return $this->hasMany(Suspect::class,'application_id','id');
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

    public function caseType() {
        return $this->belongsTo(CaseType::class,'case_type_id');
    }

    public function caseCategory() {
        return $this->belongsTo(CaseCategory::class,'case_category_id');
    }

    public function caseStatus() {
        return $this->belongsTo(CaseStatus::class,'case_status_id');
    }

    public function guardianType() {
        return $this->belongsTo(GuardianType::class,'guardian_type_id');
    }

    
    public function step() {
        return $this->hasMany(Step::class,'application_id','id');
    }

    // public function stepdate() {
    //     return $this->belongsTo(Stepdate::class,'stepdate_id');
    // }

    public function stepdate() {
        return $this->hasMany(Stepdate::class,'application_id','id');
    }



    # UserTypeWiseData
    public function scopeUtwd($query) {

        $authUser = Auth::guard('admin')->user()->load(['userType']);
        
        if($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[9]){
           return $query->where(['created_by'=>$authUser->id]);
        }elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[8]){
            return $query->where(['created_by'=>$authUser->id]);
         } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[7]){
            //return $query->where(['upazila_id'=>$authUser->upazila_id]);
            return $query;
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[6]){
            //return $query->where(['district_id'=>$authUser->district_id]);
            return $query;
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[5]){
            //return $query->where(['district_id'=>$authUser->district_id]);
            return $query;
        } else{
            return $query;
        }

        return $query;
    }

    # ServiceTypeWiseData
    public function scopeStwd($query) {

        $authUser = Auth::guard('admin')->user()->load(['userType']);
        
        return $query;
    }
}
