<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
<meta charset="UTF-8">
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@yield('title', @ $sitesetting->{'title_'. app()->getLocale()} )</title>

@if ($sitesetting->favicon)
<link href="{{ asset('storage/'.$sitesetting->favicon) }}" type="image/x-icon" rel="shortcut icon" />
@else
<link href="{{ asset('site/assets/images/favicon.png') }}" type="image/x-icon" rel="shortcut icon" />
@endif

<!-- --- Bootstrap css --- -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/landing-page-main/css/bootstrap.min.css')}}">

<!-- ---Custom Css--- -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/landing-page-main/css/layout.css')}}">

<!-- ---Font Awsome--- -->
<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">

<!--jQuery CDN-->
<!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!--- ----Feather Icon--- -->
<script src="https://unpkg.com/feather-icons"></script>
