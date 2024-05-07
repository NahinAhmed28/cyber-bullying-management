<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Status extends Model
{
    const ACTIVE = 1;
    const PENDING = 2;
    const IN_ACTIVE = 0;
    const REJECTED = 98;
    const DELETED = 99;

    const LIST = [
        self::ACTIVE => 'active',
        self::PENDING => 'pending',
        self::IN_ACTIVE => 'inactive',
        self::REJECTED => 'rejected',
        self::DELETED => 'deleted'
    ];

    const EN = [
        0 => 'Inactive',
        1 => 'Active',
    ];
    const BN = [
        0 => 'নিষ্ক্রিয়',
        1 => 'চালু',
    ];

    const EN1 = [
        0 => 'NO',
        1 => 'Yes',
    ];
    const BN1 = [
        0 => 'না',
        1 => 'হ্যাঁ',
    ];

    const EN2 = [
        0 => 'Irregular',
        1 => 'Regular',
    ];
    const BN2 = [
        0 => 'অনিয়মিত',
        1 => 'নিয়মিত',
    ];

    const EN3 = [
        0 => 'Undlivered',
        1 => 'Delivered',
    ];
    const BN3 = [
        0 => 'অননুমোদিত',
        1 => 'অনুমোদিত',
    ];

    const EN4 = [
        0 => 'Due',
        1 => 'Paid',
        2 => 'Credit',
    ];
    const BN4 = [
        0 => 'ঋণ',
        1 => 'পরিশোধ',
        2 => 'ক্রেডিট',
    ];

    const EN5 = [
        0 => 'Envelope',
        1 => 'Poly',
    ];
    const BN5 = [
        0 => 'খাম',
        1 => 'পলি',
    ];

    const EN6 = [
        0 => 'Undelivered',
        1 => 'Delivered',
    ];
    const BN6 = [
        0 => 'বিতরণ করা হয়নি',
        1 => 'বিতরণ করা হয়েছে',
    ];

    const EN7 = [
        0 => 'Regular',
        1 => 'Urgent',
    ];
    const BN7 = [
        0 => 'নিয়মিত',
        1 => 'জরুরী',
    ];

    const EN8 = [
        0 => 'False',
        1 => 'True',
    ];
    const BN8 = [
        0 => 'মিথ্যা',
        1 => 'সত্য',
    ];

    const EN9 = [
        0 => 'Unmarried',
        1 => 'Married',
    ];
    const BN9 = [
        0 => 'অবিবাহিত',
        1 => 'বিবাহিত',
    ];

    const EN10 = [
        0 => 'Female',
        1 => 'Male',
    ];
    const BN10 = [
        0 => 'মহিলা',
        1 => 'পুরুষ',
    ];
}