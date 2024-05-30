<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title')</title>

<link rel="shortcut icon" type="image/png" href="{{ asset('/images/favicon.png') }}">
<link rel="shortcut icon" sizes="192x192" href="{{ asset('/images/favicon.png') }}">
<link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/croppie.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/loader.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/chroma.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/date-uk.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/date-eu.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.mask.js') }}"></script>

<!--script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.13.1/sorting/date-eu.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.25/sorting/date-uk.js"></script-->

<!--script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chroma-js/2.1.2/chroma.min.js" integrity="sha512-8TVPS0EFkkmtT6yPb5K4csnSt3tjbKRrs0F8gvTNKv2OxOcwDO7+Klkz86gMVrzfqtZos5N2a+k+r9D+hlccmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.25/sorting/date-uk.js"></script-->

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

<!-- Other -->
<link href="https://unpkg.com/ionicons@4.1.2/dist/css/ionicons.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer">

<!-- Styles 
<link rel="stylesheet" href="{{asset('css/app.css')}}">-->
<link rel="stylesheet" href="{{asset('css/customstyles.css')}}">
<link rel="stylesheet" href="{{asset('css/customstyles2.css')}}">
<link rel="stylesheet" href="{{asset('css/croppie.min.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>

