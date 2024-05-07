<?php

namespace App\Providers;

use App\Models\User;
use App\Models\SiteSetting;
use App\Models\ContentCategory;
use Illuminate\Support\Facades\URL;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Tests\Feature\services\TestService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //app()->bind('TestService',TestService::class);
        
        //$test_service = app()->make('TestService')->msg() // use in  view.blade page

        // View::composer('*', function ($view) {
        //     $sitesetting = SiteSetting::where(['status'=>1])->first();
        //     $view->with('site_setting_data', $sitesetting);
        // });


        View::composer('*', function ($view) {
            $sitesetting = Cache::rememberForever('sitesetting', function () {
                return SiteSetting::where(['status'=>1])->first();
            });
            $view->with('sitesetting', $sitesetting);

            // $content_categories = Cache::rememberForever('content_categories', function () {
            //     return ContentCategory::with('allChildren')->where(['status'=>1,'parent_id'=>null])->orderBy('sort','asc')->get();
            // });
            // $view->with('content_categories', $content_categories);
        });
    }

    

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(env('APP_ENV') == 'production'){
            URL::forceScheme('https');
        }
        //ini_set('memory_limit', '128M');
        //ini_set('display_errors', 1);
        //ini_set('display_startup_errors', 1);
        Paginator::useBootstrap();
        date_default_timezone_set('Asia/Dhaka');
        // View::composer('*', function ($view) {
        //     $sitesetting = SiteSetting::where(['status'=>1])->first();
        //     $view->with('site_setting_data', $sitesetting);
        // });
    }
}
