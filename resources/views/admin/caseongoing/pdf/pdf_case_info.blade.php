<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PDF</title>
    <style>
        .bangla {
            font-family: kalpurush;
            font-size: 15px;
        }
    </style>
</head>

<body class="bangla">
@php
    $sarok_no = \Carbon\Carbon::parse($application->created_at)->format('dm.Y') .".". @$application->district->bbs_code .".". @$application->upazila->bbs_code .".". @$application->caseCategory->code .".". $application->code;
@endphp

<div class="container my-3 bangla text-center">
    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/site/assets/images/logo.png'))) }}" alt="Your Image" />
    <p>{{__('admin.common.ictDivision')}} <br> ({{__('admin.common.ictSection')}}) <br> www.ccpct.gov.bd</p>


</div>
<div class="row d-flex align-items-center py-4">
    <div class="col-md-6 bangla">
        <h5 class="text-bold">
            {{ (app()->getLocale() == 'en') ? "Order to take {$application->caseType->title_en}  action for the victim $application->name_en" : "ভিক্টিম $application->name_bn এর জন্য {$application->caseType->title_bn} ভিত্তিতে বেবস্থা নেয়ার নির্দেশ।" }}
        </h5>
    </div>
</div>
<table>
    <tbody>
    <tr>
        <td class="bangla" style="width: 30%">{{__('admin.common.memorial_no')}}:</td>
        <td class="bangla" style="width: 70%">
            {{(app()->getLocale() == 'en') ? $sarok_no : engToBnHlp($sarok_no)}}
        </td>
    </tr>
    <tr>
        <td class="bangla">{{ __('admin.caseongoing.name') }}</td>
        <td class="bangla">
            {{ $application->{'name_' . app()->getLocale()} }}
        </td>
    </tr>
    <tr>
        <td class="bangla">{{ __('admin.caseongoing.age') }}:</td>
        <td class="bangla">
            {{(app()->getLocale() == 'en') ? ageCal($application->dob) : dateFormatEnglishToBanglaHlp(ageCal($application->dob))}}
        </td>
    </tr>
    <tr>
        <td class="bangla">{{ __('admin.caseongoing.address') }}:</td>
        <td class="bangla">
            {{ $application->{'address_' . app()->getLocale()} }}
        </td>
    </tr>
    <tr>
        <td class="bangla">{{ __('admin.caseongoing.case_category') }}:</td>
        <td class="bangla">
            {{ $application->caseCategory->{'title_' . app()->getLocale()} }}
        </td>
    </tr>
    <tr>
        <td class="bangla">{{__('admin.service.created_at')}}:</td>
        <td class="bangla">
            {{ (app()->getLocale() == 'en') ?
            $application->created_at->format('d/m/Y') :
            dateFormatEnglishToBanglaHlp($application->created_at->format('d/m/Y')) }}
        </td>
    </tr>
    <!-- Add other rows as needed -->
    <tr>
        <td class="bangla">{{__('admin.common.gd_tracking_no')}}:</td>
        <td class="bangla">
            {{(app()->getLocale() == 'en') ? $application->code : dateFormatEnglishToBanglaHlp($application->code)}}
        </td>
    </tr>
    <tr>
        <td class="bangla">{{__('admin.common.gd_date')}}:</td>
        <td class="bangla">
            {{$application->gd_date}}
        </td>
    </tr>
    </tbody>
</table>
<div class="card">
    <div class="card-body">

        <p class="text-bold bangla">
            {{(app()->getLocale() == 'en') ? "The following discussion is a detailed discussion of steps and cases" : "নিম্নক্ত আলোচনাই পদক্ষেপ এবং কেসের বিস্তারিত আলোচনা"}}
        </p>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10%;" class="bangla">{{(app()->getLocale() == 'en') ? "Serial No" : "ক্রমিক নং"}}</th>
                    <th style="width: 90%;" class="bangla">{{(app()->getLocale() == 'en') ? "All Steps" : "পদক্ষেপ সমূহ"}}</th>
                </tr>
                </thead>
                <tbody>

                @foreach (@$application->step as $key=>$item)
                    <tr>
                        <td class="bangla">{{(app()->getLocale() == 'en') ? $key+1 : engToBnHlp($key+1)}}</td>
                        <td class="bangla">{{@$item->{'step_details_'. app()->getLocale()} }}
                            <br> <span>({{ @$item->admin->{'title_'. app()->getLocale()} }} , {{ @$item->admin->designation->{'title_'. app()->getLocale()} }})</span>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10%;" class="bangla">{{(app()->getLocale() == 'en') ? "Serial No" : "ক্রমিক নং"}}</th>
                    <th style="width: 90%;" class="bangla">{{(app()->getLocale() == 'en') ? "All Feedbacks" : "ফিডব্যাক সমূহ"}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach (@$application->stepfeed as $key=>$item)
                    <tr>
                        <td class="bangla">{{(app()->getLocale() == 'en') ? $key+1 : engToBnHlp($key+1)}}</td>
                        <td class="bangla">{{@$item->{'feedback_details_'. app()->getLocale()} }}
                            <br> <span>({{ @$item->admin->{'title_'. app()->getLocale()} }} , {{ @$item->admin->designation->{'title_'. app()->getLocale()} }})</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

<table style="width: 100%">
    <tr>
        <td style=" text-align: right;">
            @php

                    if (@$application->approveBy->dsign) {
                        $adminSign = $application->approveBy->dsign;
                        $fileExtension = pathinfo($adminSign, PATHINFO_EXTENSION);
                        $mime = 'image/' .$fileExtension;
                        if ($adminSign) {
                            $imagePath = public_path('storage/'.$adminSign); // Update the path accordingly
                        }else{
                            $imagePath = public_path('assets/dist/img/image_not_available.png'); // Default image path
                        }
                    } else {
                        $mime = 'image/png' ;
                        $imagePath = public_path('assets/dist/img/image_not_available.png'); // Default image path
                    }
                    $imageData = base64_encode(file_get_contents($imagePath));
            @endphp

            <img src="data:{{ $mime }};base64,{{ $imageData }}" style="max-width: 150px;padding-bottom: 5px" alt="Your Image" /> <br>
            <p class="bangla">{{ @$application->approveBy->{'title_'. app()->getLocale()} }} </p>
            <p class="bangla">{{ @$application->approveBy->officeDesignation->{'title_'. app()->getLocale()} }} </p>
            <p class="bangla">
                {{(app()->getLocale() == 'en') ? $application->created_at->format('d/m/Y') : dateFormatEnglishToBanglaHlp($application->created_at->format('d/m/Y')) }}
            </p>


        </td>
    </tr>
</table>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
