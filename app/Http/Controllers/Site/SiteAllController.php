<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

use App\Models\Content;
use App\Models\ContentCategory;
use App\Models\Version;
use DB;

class SiteAllController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return redirect()->route('admin.login');
        $services = Service::with('serviceType','category')->get();
        return view('app-home',compact('services'));
    }

    // public function content($slug)
    // {
    //     $count = Content::where(['status'=>1, 'slug'=>$slug])->orderBy('sort','asc')->count();
    //     if ($count == 0) {
    //         return redirect()->route('site.home');
    //     }
    //     $content = Content::with('version','contentCategory')->where(['status'=>1, 'slug'=>$slug])->orderBy('sort','asc')->first();
    //     //dd($content);
    //     return view('app-content', compact('content'));
    // }
}
