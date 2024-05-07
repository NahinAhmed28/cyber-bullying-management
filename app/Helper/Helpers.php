<?php
//use \NumberFormatter;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Support\Env;
use App\Helper\NumberToBanglaWord;

use App\Models\Lang as ModelsLang;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Cache;
use App\Helper\Numbertowordconvertsconver;
use Stichoza\GoogleTranslate\GoogleTranslate;



if (!function_exists('engToBnHlp')) {
    function engToBnHlp($number): string
    {
        $eng_to_bn = array('1' => '১', '2' => '২', '3' => '৩', '4' => '৪', '5' => '৫', '6' => '৬',
        '7' => '৭', '8' => '৮', '9' => '৯', '0' => '০','-'=>'-','+'=>'+',','=>',','*'=>'*',
        'A'=>'এ', 'B'=>'বি', 'C'=>'সি','D'=>'ডি','E'=>'ই','F'=>'এফ','G'=>'জি','H'=>'এইচ','I'=>'আই',
        'J'=>'যে','K'=>'কে','L'=>'এল','M'=>'এম','N'=>'এন','O'=>'ও','P'=>'পি','Q'=>'কিউ','R'=>'আর',
        'S'=>'এস','T'=>'টি','U'=>'ইউ','V'=>'ভি','W'=>'ডাব্লিউ','X'=>'এক্স','Y'=>'ওয়াই','Z'=>'জেড',

        'a'=>'এ', 'b'=>'বি','c'=>'সি','d'=>'ডি','e'=>'ই','f'=>'এফ','g'=>'জি','h'=>'এইচ','i'=>'আই',
        'j'=>'যে','k'=>'কে','l'=>'এল','m'=>'এম','n'=>'এন','o'=>'ও','p'=>'পি','q'=>'কিউ','r'=>'আর',
        's'=>'এস','t'=>'টি','u'=>'ইউ','v'=>'ভি','w'=>'ডাব্লিউ','x'=>'এক্স','y'=>'ওয়াই','z'=>'জেড');

        return strtr($number, $eng_to_bn);
    }
}

if (!function_exists('numToWord')) {
    function numToWord($number): string
    {
        return Numbertowordconvertsconver::convert_number($number);
    }
}

if (!function_exists('numToWordBn')) {
    function numToWordBn($number): string
    {
        return NumberToBanglaWord::numToWord($number);
    }
}

if (!function_exists('findTimer')) {
    function findTimer($input_date, $lang): string
    {
        $createdAt = Carbon::parse($input_date); // Convert the input to a Carbon instance

        $now = Carbon::now(); // Get the current time using Carbon

        // Calculate the difference
        $diff = $createdAt->diff($now);

        // Extract days, hours, and minutes
        $days = $diff->days;
        $hours = $diff->h;
        $minutes = $diff->i;

        // Language-specific formatting
        if ($lang == 'en') {
            return $days . ' day(s), ' . $hours . ' hour(s), ' . $minutes . ' minute(s)';
        } else {
            return $days . '  দিনঃ ' . $hours . ' ঘণ্টাঃ ' . $minutes . ' মিনিট';
        }
    }
}


if (!function_exists('dateFormatEnglishToBanglaHlp')) {
    function dateFormatEnglishToBanglaHlp($currentDate): string
    {
        $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
            'May','June','July','August','September','October','November','December','Saturday','Sunday',
            'Monday','Tuesday','Wednesday','Thursday','Friday',
            'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec',
            'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R',
            'S','T','U','V','w','X','Y','Z',
            'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o',
            'p','q','r','s','t','u','v','w','x','y','z'
        );
        $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
            'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
            বুধবার','বৃহস্পতিবার','শুক্রবার',
            'জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
            'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর',

            'এ','বি','সি','ডি','ই','এফ','জি','এইচ','আই','যে','কে','এল','এম',
            'এন','ও','পি','কিউ','আর','এস','টি','ইউ','ভি','ডাব্লিউ','এক্স','ওয়াই','জেড',
            'এ','বি','সি','ডি','ই','এফ','জি','এইচ','আই','যে','কে','এল','এম',
            'এন','ও','পি','কিউ','আর','এস','টি','ইউ','ভি','ডাব্লিউ','এক্স','ওয়াই','জেড',
        );
        $convertedDATE = str_replace($engDATE, $bangDATE, $currentDate);
        return $convertedDATE;
    }
}
//google translate for other lang
if (!function_exists('gtransol')) {
    function gtransol($str)
    {
        if ($str) {
            return GoogleTranslate::trans($str,env('OTHER_LANG_LOCALE'));
        }else{
            return null;
        }
    }
}

if (!function_exists('gtrans')) {
    function gtrans($str)
    {
        //$gt = new GoogleTranslate(app()->getLocale());
        //return $gt->translate($str);
        return GoogleTranslate::trans($str,app()->getLocale());
    }
}

if (!function_exists('gtrans_backend')) {
    function gtrans_backend($str)
    {
        return GoogleTranslate::trans($str,env('OTHER_LANG_LOCALE'));
    }
}

if (!function_exists('authGetLocWiseInfo')) {
    function authGetLocWiseInfo()
    {
        // $locWiseAuthUserInfo = Cache::rememberForever('locWiseAuthUserInfo', function () {
        //     return Auth::guard('admin')->user()->load(['division','district','upazila','userType','branch']);
        // });

        $locWiseAuthUserInfo = Auth::guard('admin')->user()->load(['division','district','upazila','userType','branch','designation']);
        // if ($locWiseAuthUserInfo->userType->default_role == Admin::DEFAULT_ROLE_LIST[5]) {
        //     // return $userInfo = $locWiseAuthUserInfo->userType->{'title_'. app()->getLocale()} ." - ". @$locWiseAuthUserInfo->division->{'title_'. app()->getLocale()} ." - ". @$locWiseAuthUserInfo->district->{'title_'. app()->getLocale()} ." - ". @$locWiseAuthUserInfo->branch->{'title_'. app()->getLocale()};

        //     return $userInfo = $locWiseAuthUserInfo->userType->{'title_'. app()->getLocale()} ." - ". @$locWiseAuthUserInfo->branch->{'title_'. app()->getLocale()};
        // }elseif($locWiseAuthUserInfo->userType->default_role == Admin::DEFAULT_ROLE_LIST[4]){
        //     // return $userInfo = $locWiseAuthUserInfo->userType->{'title_'. app()->getLocale()} ." - ". @$locWiseAuthUserInfo->division->{'title_'. app()->getLocale()} ." - ". @$locWiseAuthUserInfo->district->{'title_'. app()->getLocale()} ." - ". @$locWiseAuthUserInfo->branch->{'title_'. app()->getLocale()};

        //     return $userInfo = $locWiseAuthUserInfo->userType->{'title_'. app()->getLocale()} ." - ". @$locWiseAuthUserInfo->branch->{'title_'. app()->getLocale()};
        // }elseif($locWiseAuthUserInfo->userType->default_role == Admin::DEFAULT_ROLE_LIST[3]){
        //     return $userInfo = $locWiseAuthUserInfo->userType->{'title_'. app()->getLocale()} ." - ". @$locWiseAuthUserInfo->division->{'title_'. app()->getLocale()} ." - ". @$locWiseAuthUserInfo->district->{'title_'. app()->getLocale()};
        // }else{
        //     return $userInfo = $locWiseAuthUserInfo->userType->{'title_'. app()->getLocale()} ." - ". @$locWiseAuthUserInfo->division->{'title_'. app()->getLocale()};
        // }

        return $userInfo = $locWiseAuthUserInfo->{'title_'. app()->getLocale()}." - ". @$locWiseAuthUserInfo->designation->{'title_'. app()->getLocale()} ;

    }
}

if (!function_exists('authCheck')) {
    function authCheck()
    {
        if(Auth::guard('admin')->check()){
            return Auth::guard('admin')->user()->name;
        }
        elseif(Auth::guard('web')->check()){
            return Auth::guard('web')->user()->name;
        }
    }
}

if (!function_exists('isAdmin')) {
    function isAdmin()
    {
        if(Auth::guard('admin')->check()){
            return true;
        }else{
            return false;
        }
    }
}

if (!function_exists('dateFormat')) {
    function dateFormat($date)
    {
        return $dob_format = date("d-m-Y",strtotime($date));
    }
}

if (!function_exists('ageCal')) {
    function ageCal($dob)
    {
        $dob_format = date("m-d-Y",strtotime($dob));
        $birthDate = explode("-", $dob_format);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
        ? ((date("Y") - $birthDate[2]) - 1)
        : (date("Y") - $birthDate[2]));
        return $age;
    }
}

if (!function_exists('isUser')) {
    function isUser()
    {
        if(Auth::guard('web')->check()){
            return true;
        }else{
            return false;
        }
    }
}

if (!function_exists('digitMasking')) {
    function digitMasking($number, $mc)
    {
        if ($number) {

            if (strlen($number) < 6) {
                return $number;
            } else {
                $len = strlen($number);
                $first = substr($number, 0, 2);
                $last = substr($number, ($len-2), 2);
                $r_digit = $len - 4;
                return $masking = substr_replace($number, str_repeat($mc , $r_digit), 2, $r_digit);
            }
        } else {
            return null;
        }
    }
}

if (!function_exists('getCurrency')) {
    function getCurrency($number)
    {
        $get_locale_currency =  config('services.currency');
        $get_locale =  config('services.locale');
        $localeCurrency =  $get_locale_currency[app()->getLocale()] ?? 'USD';
        $locale =  $get_locale[app()->getLocale()] ?? 'en-US';

        $formatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
        $bn =  $formatter->formatCurrency($number, $localeCurrency); // should be return if we get locale wise currency
        //$en =  number_format($number, 0) .'৳';
        $en =  number_format($number, 0) .'';
        return $result =  (app()->getLocale() == 'en') ? $en : $bn;
    }
}


if (!function_exists('getEnLang')) {
    function getEnLang()
    {
        $langEnDatas = Cache::rememberForever('langEnDatas', function () {
            $query = ModelsLang::get()->groupBy('page');
            return $level1datas = json_decode(json_encode($query), True);
        });

        $data = [];
        $output = [];
        foreach ($langEnDatas as $index1 => $level1data) {
            foreach ($level1data as $index2 => $value) {
            $key = $value['key'];
            $lang_1 = $value['lang_1'];

            $output[$key] = $lang_1;
            }
            $data[$index1] = $output;
        }
        return $data;
    }
}

if (!function_exists('getBnLang')) {
    function getBnLang()
    {
        $langBnDatas = Cache::rememberForever('langBnDatas', function () {
            $query = ModelsLang::get()->groupBy('page');
            return $level1datas = json_decode(json_encode($query), True);
        });

        $data = [];
        $output = [];
        foreach ($langBnDatas as $index1 => $level1data) {
            foreach ($level1data as $index2 => $value) {
            $key = $value['key'];
            $lang_2 = $value['lang_2'];

            $output[$key] = $lang_2;
            }
            $data[$index1] = $output;
        }
        return $data;
    }
}
