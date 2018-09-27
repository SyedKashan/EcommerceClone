<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home | E-Shopping</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{asset('svg/frontendImages/icons/favicon.png')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/frontendcss/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/frontendFonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/frontendFonts/themify/themify-icons.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/frontendFonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/frontendFonts/elegant-font/html-css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/frontendcss/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/frontendcss/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/frontendcss/animsition/css/animsition.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/frontendcss/select2/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/frontendcss/slick/slick.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/frontendcss/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontendcss/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontendcss/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontendcss/lightbox2/css/lightbox.min.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontendcss/noui/nouislider.min.css')}}">

</head>
<body class="animsition">

        @include('layouts/FrontLayout/front_header')
        @yield('contents')
        @extends('layouts/FrontLayout/front_footer')
        @section('foot')
@foreach ($categories as $category)
    <ul class="p-b-9 main_menu1 ">
        <li>
        <a href="#" class="s-text7">
        {{$category->name}}
         </a>
         <ul class="sub_menu1">
        @foreach ($subcategories as $sub)
        @if($sub->parentId == $category->id)
        
        <li >
                <a href="#" class="s-text7">
                -> {{$sub->name}}
                </a>
        </li>
        @endif
        @endforeach
    </ul>
        </li>
    </ul>
@endforeach
@endsection
<div class="btn-back-to-top bg0-hov" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </span>
    </div>
    
@yield('container')
        {{-- <script src="http://code.jquery.com/jquery-2.x-git.min.js"></script> --}}
        <script type="text/javascript" src="{{asset('js/frontendJs/jquery/jquery-3.2.1.min.js')}}"></script> 
				<script type="text/javascript" src="{{asset('js/frontendJs/daterangepicker/moment.min.js')}}"></script>
				<script type="text/javascript" src="{{asset('js/frontendJs/daterangepicker/daterangepicker.js')}}"></script>
				
            <script type="text/javascript" src="{{asset('js/frontendJs/animsition/js/animsition.min.js')}}"></script>   
            <script type="text/javascript" src="{{asset('js/frontendJs/bootstrap/js/popper.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/frontendJs/bootstrap/js/bootstrap.min.js')}}"></script> 
            <script type="text/javascript" src="{{asset('js/frontendJs/select2/select2.min.js')}}"></script>
@yield('containerDesign')
            <script type="text/javascript" src="{{asset('js/frontendJs/slick/slick.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/frontendJs/slick-custom.js')}}"></script>        
            <script type="text/javascript" src="{{asset('js/frontendJs/countdowntime/countdowntime.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/frontendJs/lightbox2/js/lightbox.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/frontendJs/sweetalert/sweetalert.min.js')}}"></script>
@yield('sweetalert')
            <script src="{{asset('js/frontendJs/main.js')}}"></script> 
            <script src="{{asset('js/frontendJs/main.min.js')}}"></script> 
            <script src="{{asset('js/frontendJs/map-custom.js')}}"></script> 
            <script src="{{asset('js/frontendJs/map-custom.min.js')}}"></script> 
            
           
</body>
</html>