<?php

return [
    'watermark_image_size' => 'D',
    'watermark_image_position' => 'P',
    'custom_font_dir' => public_path('assets/css/fonts/'), // don't forget the trailing slash!
    'custom_font_data' => [
        'kalpurush' => [ // must be lowercase and snake_case
            'R' => 'kalpurush.ttf',    // regular font,
            'B' => 'kalpurush.ttf',    // bold font,
            'useOTL' => 0xFF,
            'useKashida' => 75
        ]
    ],
];
