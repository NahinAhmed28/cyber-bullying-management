<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PDF Example</title>
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
    <p>{{__('admin.common.ictDivision')}} <br> ({{__('admin.common.ictSection')}}) </p>

</div>
<div class="container my-3 bangla text-center">
    <p style="font-size: 20px;font-weight: bold">
        <u>{{ __('admin.caseongoing.victim') }}: ( {{ $application->{'name_' . app()->getLocale()} }} ) {{ __('admin.caseongoing.detail') }}
        </u>
    </p>
</div>


<div class="container mt-5">
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td class="bangla" style="width: 35%;">{{__('admin.common.memorial_no')}}</td>
            <td class="bangla" style="width: 35%;">{{(app()->getLocale() == 'en') ? $sarok_no : engToBnHlp($sarok_no)}}</td>
            <td rowspan="7" class="bangla" style="width: 40%;">
                <div class="text-bold bangla">
                    {{__("admin.application.dsign")}} <br><br>
                </div>

                @php

                    if (@$application->dsign) {
                                            $adminSign = $application->dsign;
                                            $fileExtension = pathinfo($adminSign, PATHINFO_EXTENSION);
                                            $mime = 'image/' .$fileExtension;
                                            $imagePath = public_path('storage/'.$adminSign); // Update the path accordingly
                                        } else {
                                            $mime = 'image/png' ;
                                            $imagePath = public_path('assets/dist/img/avatar.png'); // Default image path
                                        }
                                        $imageData = base64_encode(file_get_contents($imagePath));
                @endphp


                @if (@$application->dsign)
                <img src="data:{{ $mime }};base64,{{ $imageData }}" alt="Your Image" />
                @endif
            </td>
        </tr>
        <tr>
            <td class="bangla">{{ __('admin.application.name') }}</td>
            <td class="bangla">{{ $application->{'name_' . app()->getLocale()} }}</td>
        </tr>
    <tr>
        <td class="bangla">{{ __('admin.application.age') }}</td>
        <td class="bangla">{{ (app()->getLocale() == 'en') ? $application->created_at->format('d/m/Y') : dateFormatEnglishToBanglaHlp($application->created_at->format('d/m/Y')) }}</td>
    </tr>
    <tr>
        <td class="bangla">{{ __('admin.application.gender') }}</td>
        <td class="bangla">
            {{ (app()->getLocale() == 'en') ? ($application->gender == 1 ? 'Male' : 'Female') : ($application->gender == 1 ? 'পুরুষ' : 'নারী') }}
        </td>
    </tr>
    <tr>
        <td class="bangla">{{ __('admin.caseongoing.class') }}</td>
        <td class="bangla">{{ $application->{'class_' . app()->getLocale()} }}</td>
    </tr>
    <tr>
        <td class="bangla">{{ __('admin.caseongoing.school') }}</td>
        <td class="bangla">{{ $application->{'school_' . app()->getLocale()} }}</td>
    </tr>
    <tr>
        <td class="bangla">{{ __('admin.caseongoing.address') }}</td>
        <td class="bangla">{{ $application->{'address_' . app()->getLocale()} }}</td>
    </tr>
    <tr>
        <td class="bangla">{{ __('admin.caseongoing.contact') }}</td>
        <td class="bangla">{{ (app()->getLocale() == 'en') ? $application->contact : dateFormatEnglishToBanglaHlp($application->contact) }}</td>
    </tr>
    <tr>
        <td class="bangla">{{ __('admin.caseongoing.guardian') }}</td>
        <td class="bangla">{{ $application->{'guardian_' . app()->getLocale()} }}</td>
    </tr>
    <tr>
        <td class="bangla">{{ __('admin.caseongoing.guardian_contact') }}</td>
        <td class="bangla">{{ (app()->getLocale() == 'en') ? $application->guardian_contact : dateFormatEnglishToBanglaHlp($application->guardian_contact) }}</td>
    </tr>
    <tr>
        <td class="bangla">{{__('admin.application.risk')}}</td>
        <td class="btn btn-outline-danger bangla">{{@$application->risk->{'title_'. app()->getLocale()} }}</td>
    </tr>
        </tbody>
    </table>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
