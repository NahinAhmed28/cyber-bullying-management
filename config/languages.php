<?php
return [
    'en' => [
        'display' => 'English',
        'flag-icon' => 'us'
    ],
    env('OTHER_LANG_LOCALE') => [
        'display' => env('OTHER_LANG_LOCALE_FULL'),
        'flag-icon' => env('OTHER_LANG_LOCALE')
    ],
];
