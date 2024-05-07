<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
//use App\Permissions\HasPermissionsTrait;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity;
    //use HasPermissionsTrait; //Import The Trait
    public $timestamps = true;
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'name','username','email','password','email_verified_at','remember_token','thumb','status',
    //     'created_by','updated_by'
    // ];
    

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static $recordEvents = ['updated','deleted'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('users')
        ->logAll()
        //->logOnly(['name'])
        ->setDescriptionForEvent(fn(string $eventName) => "users has been {$eventName}")
        ->dontLogIfAttributesChangedOnly(['password'])
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }

    public function getStatusAttribute($value)
    {
        return $status = (app()->getLocale() == 'en') ? Status::EN[$value] : Status::BN[$value];
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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

    public function association() {
        return $this->belongsTo(Association::class,'association_id');
    }

    public function caliph() {
        return $this->belongsTo(Admin::class,'caliph_id');
    }

    public function president() {
        return $this->belongsTo(Admin::class,'president_id');
    }

    public function vicePresident() {
        return $this->belongsTo(Admin::class,'vice_president_id');
    }

    public function area() {
        return $this->belongsTo(Area::class,'area_id');
    }

    public function branch() {
        return $this->belongsTo(Branch::class,'branch_id');
    }
    
    public function branchUnit() {
        return $this->belongsTo(BranchUnit::class,'branch_unit_id');
    }
}
