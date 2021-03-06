<!DOCTYPE html>
<html lang="en">
<head>
	<title> E-Shopping </title>
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
@if($category->status == '1')
    <ul class="p-b-9 main_menu1 ">    
        <li>
        <a href="#" class="s-text7">
        {{$category->name}}
         </a>
         @foreach ($subcategories as $sub)
         @if($sub->parentId == $category->id && $sub->status == '1')
         <ul class="sub_menu1">
        <li >
                <a href="#" class="s-text7">
                -> {{$sub->name}}
                </a>
        </li>
    </ul>
    @endif
    @endforeach
        </li>
    </ul>
    @endif
@endforeach
@endsection
<div class="btn-back-to-top bg0-hov" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </span>
    </div>
    
<!-- Container Selection -->
<div id="dropDownSelect1"></div>
<div id="dropDownSelect2"></div>
        {{-- <script src="http://code.jquery.com/jquery-2.x-git.min.js"></script> --}}
        <script type="text/javascript" src="{{asset('js/frontendJs/jquery/jquery-3.2.1.min.js')}}"></script> 
				<script type="text/javascript" src="{{asset('js/frontendJs/daterangepicker/moment.min.js')}}"></script>
				<script type="text/javascript" src="{{asset('js/frontendJs/daterangepicker/daterangepicker.js')}}"></script>
				
            <script type="text/javascript" src="{{asset('js/frontendJs/animsition/js/animsition.min.js')}}"></script>   
            <script type="text/javascript" src="{{asset('js/frontendJs/bootstrap/js/popper.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/frontendJs/bootstrap/js/bootstrap.min.js')}}"></script> 
            <script type="text/javascript" src="{{asset('js/frontendJs/select2/select2.min.js')}}"></script>
            <script type="text/javascript">
                $(".selection-1").select2({
                    minimumResultsForSearch: 20,
                    dropdownParent: $('#dropDownSelect1')
                });
            
                $(".selection-2").select2({
                    minimumResultsForSearch: 20,
                    dropdownParent: $('#dropDownSelect2')
                });
            </script>
            <script type="text/javascript" src="{{asset('js/frontendJs/slick/slick.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/frontendJs/slick-custom.js')}}"></script>        
            <script type="text/javascript" src="{{asset('js/frontendJs/countdowntime/countdowntime.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/frontendJs/lightbox2/js/lightbox.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/frontendJs/sweetalert/sweetalert.min.js')}}"></script>
            <script type="text/javascript">
                $('.block2-btn-addcart').each(function(){
                    var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
                    $(this).on('click', function(){
                        swal(nameProduct, "is added to cart !", "success");
                    });
                });
            
                $('.block2-btn-addwishlist').each(function(){
                    var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
                    $(this).on('click', function(){
                        swal(nameProduct, "is added to wishlist !", "success");
                    });
                });
            </script>
            <script src="{{asset('js/frontendJs/main.js')}}"></script> 
            {{-- <script src="{{asset('js/frontendJs/main.min.js')}}"></script>  --}}
            <script src="{{asset('js/frontendJs/map-custom.js')}}"></script> 
            {{-- <script src="{{asset('js/frontendJs/map-custom.min.js')}}"></script>  --}}
            
           
</body>
</html>