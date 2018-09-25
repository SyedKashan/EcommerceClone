<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset('css/backendcss/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/backendcss/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/backendcss/select2.css')}} " />
<link rel="stylesheet" href="{{asset('css/backendcss/uniform.min.css')}} " />
<link rel="stylesheet" href="{{asset('css/backendcss/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('css/backendcss/matrix-style.css')}}" />
<link rel="stylesheet" href="{{asset('css/backendcss/matrix-media.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" />
<link href="{{asset('fonts/backendFonts/css/font-awesome.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('css/backendcss/jquery.gritter.css')}}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
@include('layouts/adminLayout/admin_header')
@include('layouts/adminLayout/admin_sidebar')
@yield('contents')
@include('layouts/adminLayout/admin_footer')
 <script src="{{asset('js/backendJs/excanvas.min.js')}}"></script>  
 <script src="{{asset('js/backendJs/jquery.min.js')}}"></script> 
 <script src="{{asset('js/backendJs/jquery.ui.custom.js')}}"></script> 
 <script src="{{asset('js/backendJs/bootstrap.min.js')}}"></script> 
 <script src="{{asset('js/backendJs/jquery.flot.min.js')}}"></script> 
 <script src="{{asset('js/backendJs/jquery.flot.resize.min.js')}}"></script> 
 <script src="{{asset('js/backendJs/jquery.peity.min.js')}}"></script> 
 <script src="{{asset('js/backendJs/fullcalendar.min.js')}}"></script> 
 <script src="{{asset('js/backendJs/matrix.js')}}"></script> 
 <script src="{{asset('js/backendJs/matrix.dashboard.js')}}"></script> 
 <script src="{{asset('js/backendJs/jquery.gritter.min.js')}}"></script> 
 <script src="{{asset('js/backendJs/matrix.interface.js')}}"></script> 
 <script src="{{asset('js/backendJs/matrix.chat.js')}}"></script> 
 <script src="{{asset('js/backendJs/jquery.validate.js')}}"></script> 
 <script src="{{asset('js/backendJs/jquery.wizard.js')}}"></script> 
 <script src="{{asset('js/backendJs/jquery.uniform.js')}}"></script> 
 <script src="{{asset('js/backendJs/select2.min.js')}}"></script> 
 <script src="{{asset('js/backendJs/matrix.popover.js')}}"></script> 
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
 <script src="{{asset('js/backendJs/matrix.tables.js')}}"></script>
 <script src="{{asset('js/backendJs/matrix.form_validation.js')}}"></script> 
 <script src="{{asset('js/backendJs/matrix.popover.js')}}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

</body>
</html>
