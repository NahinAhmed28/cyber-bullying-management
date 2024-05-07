<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        App\Models\Role::class => App\Policies\RolePolicy::class,
        App\Models\UserType::class => App\Policies\UserTypePolicy::class,
        App\Models\User::class => App\Policies\UserPolicy::class,
        App\Models\Admin::class => App\Policies\AdminPolicy::class,
        App\Models\SiteSetting::class => App\Policies\SiteSettingPolicy::class,
        App\Models\Lang::class => App\Policies\LangPolicy::class,

        App\Models\Size::class => App\Policies\SizePolicy::class,
        App\Models\CnOrder::class => App\Policies\CnOrderPolicy::class,
        App\Models\OfficeType::class => App\Policies\OfficeTypePolicy::class,
        App\Models\ServiceType::class => App\Policies\ServiceTypePolicy::class,
        App\Models\VehicleType::class => App\Policies\VehicleTypePolicy::class,
        App\Models\Vehicle::class => App\Policies\VehiclePolicy::class,

        App\Models\Service::class => App\Policies\ServicePolicy::class,
        App\Models\ServiceRequest::class => App\Policies\ServiceRequestPolicy::class,
        App\Models\ServiceRequestDeli::class => App\Policies\ServiceRequestDeliPolicy::class,
        App\Models\ServiceSelfDeli::class => App\Policies\ServiceSelfDeliPolicy::class,

        App\Models\Loading::class => App\Policies\LoadingPolicy::class,
        App\Models\Unloading::class => App\Policies\UnloadingPolicy::class,
        App\Models\Tracking::class => App\Policies\TrackingPolicy::class,

        App\Models\Division::class => App\Policies\DivisionPolicy::class,
        App\Models\District::class => App\Policies\DistrictPolicy::class,
        App\Models\Upazila::class => App\Policies\UpazilaPolicy::class,
        App\Models\Branch::class => App\Policies\BranchPolicy::class,
        App\Models\BranchUser::class => App\Policies\BranchUserPolicy::class,
    ];

    /*protected $policies = [
        Post::class => PostPolicy::class,
    ];*/

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
   
        /*Gate::define('isSuperAdmin', function($user) {
           return $user->role == 'superadmin';
        });
        Gate::define('isAdmin', function($user) {
           return $user->role == 'admin';
        });
        Gate::define('isManager', function($user) {
            return $user->role == 'manager';
        });
        Gate::define('isUser', function($user) {
            return $user->role == 'user';
        });*/
    }
}
