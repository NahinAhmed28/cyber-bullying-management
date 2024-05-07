<?php

namespace App\Models;

use App\Scopes\StatusScope;
use Illuminate\Support\Str;

use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{
    use HasFactory, LogsActivity;
    public $timestamps = true;
    protected $guarded = ['id'];

    protected static $recordEvents = ['updated','deleted'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('areas')
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


    # UserTypeWiseData
    public function scopeUtwd($query) {

        $authUser = Auth::guard('admin')->user()->load(['userType']);
        
        if($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[8]){
            return $query->where('user_type_id','>=',$authUser->userType->default_role)->where(['created_by_id'=>$authUser->created_by_id]);
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[7]){
            return $query->where('user_type_id','>=',$authUser->userType->default_role)->where(['created_by_id'=>$authUser->created_by_id]);
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[6]){
            return $query->where('user_type_id','>=',$authUser->userType->default_role)->where(['upazila_id'=>$authUser->upazila_id]);
        } elseif($authUser->userType->default_role == Admin::DEFAULT_ROLE_LIST[5]){
            return $query->where('user_type_id','>=',$authUser->userType->default_role)->where(['district_id'=>$authUser->district_id]);
        } else{
            return $query;
        }

        return $query;
    }
    
}
