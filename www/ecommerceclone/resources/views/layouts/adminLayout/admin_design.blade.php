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
<link href="{{asset('fonts/backendFonts/css/font-awesome.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('css/backendcss/jquery.gritter.css')}}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
@include('layouts/adminLayout/admin_header')
@include('layouts/adminLayout/admin_sidebar')
@yield('contents')
@include('layouts/adminLayout/admin_footer')
<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
 
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
 <script src="{{asset('js/backendJs/jquery.dataTables.min.css')}}"></script> 
 <script src="{{asset('js/backendJs/matrix.tables.js')}}"></script>
 <script src="{{asset('js/backendJs/matrix.form_validation.js')}}"></script> 
 <script src="{{asset('js/matrix.popover.js')}}"></script>
 

</body>
</html>
