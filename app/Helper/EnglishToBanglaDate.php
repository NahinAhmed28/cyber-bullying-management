<?php

namespace App\Helper;

class EnglishToBanglaDate
{
    public static function dateFormatEnglishToBangla($currentDate): string
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
        return "$convertedDATE";
    }
}
