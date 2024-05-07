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


<div class="container my-3 bangla text-center">
    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/site/assets/images/logo.png'))) }}" alt="Your Image" />
    <p>{{__('admin.common.ictDivision')}} <br> ({{__('admin.common.ictSection')}}) </p>

</div>

@foreach(@$application->suspect as $suspect)
<div class="container my-3 bangla text-center">
    <p style="font-size: 20px;font-weight: bold">
        <u>{{ __('admin.application.suspicious_details') }}
        </u>
    </p>
</div>

<div class="container mt-5">
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td class="bangla" style="width: 35%;">{{ __('admin.application.suspicious_name') }}</td>
            <td class="bangla" style="width: 35%;">{{ $suspect->{'suspicious_name_' . app()->getLocale()} }}</td>
            <td rowspan="7" class="bangla" style="width: 40%;">
                <div class="text-bold bangla">
                    {{__("admin.application.ssign")}} <br><br>
                </div>

                @php

                    if (@$suspect->ssign) {
                                            $suspectSign = $application->approveBy->dsign;
                                            $fileExtension = pathinfo($suspectSign, PATHINFO_EXTENSION);
                                            $mime = 'image/' .$fileExtension;
                                            $imagePath = public_path('storage/'.@$suspect->ssign); // Update the path accordingly
                                        } else {
                                            $mime = 'image/png' ;
                                            $imagePath = public_path('assets/dist/img/avatar.png'); // Default image path
                                        }
                                        $imageData = base64_encode(file_get_contents($imagePath));
                @endphp

                @if (@$suspect->ssign)
                <img src="data:{{ $mime }};base64,{{ $imageData }}" alt="Your Image" />
                @endif
            </td>
        </tr>
        <tr>
            <td class="bangla">{{ __('admin.application.suspicious_age') }}</td>
            <td class="bangla">{{(app()->getLocale() == 'en') ? ageCal($suspect->suspicious_age) : dateFormatEnglishToBanglaHlp(ageCal($suspect->suspicious_age))}}</td>
        </tr>
        <tr>
            <td class="bangla">{{ __('admin.application.suspicious_gender') }}</td>
            <td class="bangla">{{ (app()->getLocale() == 'en') ? (($suspect->suspicious_gender == 1) ? 'Male' : 'Female') : (($suspect->suspicious_gender == 1) ? 'পুরুষ' : ' নারী') }}</td>
        </tr>
        <tr>
            <td class="bangla">{{ __('admin.application.suspicious_address') }}</td>
            <td class="bangla">
                {{ $suspect->{'suspicious_address_' . app()->getLocale()} }}
            </td>
        </tr>
        <tr>
            <td class="bangla">{{ __('admin.application.suspicious_class') }}</td>
            <td class="bangla">{{ $suspect->{'suspicious_class_' . app()->getLocale()} }}</td>
        </tr>
        <tr>
            <td class="bangla">{{ __('admin.application.suspicious_school') }}</td>
            <td class="bangla">{{ $suspect->{'suspicious_school_' . app()->getLocale()} }}</td>
        </tr>
        <tr>
            <td class="bangla">{{ __('admin.application.suspicious_contact') }}</td>
            <td class="bangla">{{(app()->getLocale() == 'en') ? @$suspect->suspicious_contact : engToBnHlp(@$suspect->suspicious_contact)}}</td>
        </tr>
        <tr>
            <td class="bangla">{{ __('admin.application.suspicious_guardian') }}</td>
            <td class="bangla">{{ $suspect->{'suspicious_guardian_' . app()->getLocale()} }}</td>
        </tr>
        <tr>
            <td class="bangla">{{ __('admin.application.suspicious_guardian_contact') }}</td>
            <td class="bangla"> @if (@$suspect->suspicious_guardian_contact)
                    {{(app()->getLocale() == 'en') ? @$suspect->suspicious_guardian_contact : engToBnHlp(@$suspect->suspicious_guardian_contact)}}
                @endif
            </td>
        </tr>
        </tbody>
    </table>
</div>
@endforeach
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
