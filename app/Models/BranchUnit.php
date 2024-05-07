<?php

namespace App\Models;

use App\Scopes\StatusScope;
use Illuminate\Support\Str;

use Spatie\Activitylog\LogOptions;
use App\Scopes\TitleAscendingScope;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BranchUnit extends Model
{
    use HasFactory, LogsActivity;
    public $timestamps = true;
    protected $guarded = ['id'];

    protected static $recordEvents = ['updated','deleted'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('branch_units')
        ->logAll()
        //->logOnly(['name'])
        ->setDescriptionForEvent(fn(string $eventName) => $eventName)
        //->dontLogIfAttributesChangedOnly(['sort'])
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }

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
        static::addGlobalScope(new TitleAscendingScope);
    }

    public function officeType() {
        return $this->belongsTo(OfficeType::class,'office_type_id');
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

    public function division() {
        return $this->belongsTo(Division::class,'division_id');
    }

    public function district() {
        return $this->belongsTo(District::class,'district_id');
    }

    public function upazila() {
        return $this->belongsTo(Upazila::class,'upazila_id');
    }



    // Location user type wise data
    public function scopeUtwd($query) {

        $authUser = Auth::guard('admin')->user()->load(['userType']);
        
        if($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[8]){
            return $query->where(['id' => $authUser->id]);
        }
        elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[7]){
            return $query->where(['branch_id' => $authUser->branch_id, 'user_type_id' => Admin::CA]);
        }
        elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[6]){
            return $query->where(['branch_id' => $authUser->branch_id, 'user_type_id' => Admin::VP]);
        }
        elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[5]){
            return $query->where(['area_id' => $authUser->area_id, 'user_type_id' => Admin::P]);
        }
        elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[4]){
            return $query->where(['association_id' => $authUser->association_id, 'user_type_id' => Admin::HA]);
        }
        elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[3]){
            return $query->where(['user_type_id' => Admin::AD]);
        }
        elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[2]){
            return $query;
        }
        else{
            return $query;
        }
    }
}
