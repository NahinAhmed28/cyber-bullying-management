<?php

namespace App\Models;

use App\Scopes\StatusScope;
use Illuminate\Support\Str;

use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CaseType extends Model
{
    use HasFactory, LogsActivity;
    public $timestamps = true;
    protected $guarded = ['id'];

    protected static $recordEvents = ['updated','deleted'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('case_types')
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

    public function pendingapplications()
    {
        return $this->hasMany(Application::class, 'case_type_id', 'id')->where('case_status_id', Admin::Pending);
    }

    public function ongoingapplications()
    {
        return $this->hasMany(Application::class, 'case_type_id', 'id')->where('case_status_id', Admin::Ongoing);
    }

    public function declinedapplications()
    {
        return $this->hasMany(Application::class, 'case_type_id', 'id')->where('case_status_id', Admin::Declined);
    }

    public function incompleteapplications()
    {
        return $this->hasMany(Application::class, 'case_type_id', 'id')->where('case_status_id', Admin::Incomplete);
    }

    public function completeapplications()
    {
        return $this->hasMany(Application::class, 'case_type_id', 'id')->where('case_status_id', Admin::Complete);
    }

    // public function stepdate() {
    //     return $this->hasMany(Stepdate::class,'application_id','id');
    // }

    // public function scopeActive($query)
    // {
    //     return $query->where('status',1);
    // }


    //Admin::withoutGlobalScopes([FirstScope::class, SecondScope::class])->get();

    protected static function booted()
    {
        static::addGlobalScope(new StatusScope);
    }


}
