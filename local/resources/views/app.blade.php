<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<link rel="icon" type="{{ asset('image/ico') }}" href="favicon.ico"/>
    
    <link href="{{ asset('css/stylesheets.css') }}" rel="stylesheet" type="text/css" />  
    <!--[if lt IE 8]>
        <link href="css/ie7.css" rel="stylesheet" type="text/css" />
    <![endif]-->            
    <link rel='stylesheet' type='text/css' href={{ asset('css/fullcalendar.print.css') }} media='print' />
    
    <script type='text/javascript' src={{ asset('js/jquery.min.js') }}></script>
    <script type='text/javascript' src={{ asset('js/jquery-ui.min.js') }}></script>
    <script type='text/javascript' src={{ asset('js/plugins/jquery/jquery.mousewheel.min.js') }}></script>
    
    <script type='text/javascript' src={{ asset('js/plugins/cookie/jquery.cookies.2.2.0.min.js') }}></script>
    
    <script type='text/javascript' src={{ asset('js/plugins/bootstrap.min.js') }}></script>
    
    <script type='text/javascript' src={{ asset('js/plugins/charts/excanvas.min.js') }}></script>
    <script type='text/javascript' src={{ asset('js/plugins/charts/jquery.flot.js') }}></script>    
    <script type='text/javascript' src={{ asset('js/plugins/charts/jquery.flot.stack.js') }}></script>    
    <script type='text/javascript' src={{ asset('js/plugins/charts/jquery.flot.pie.js') }}></script>
    <script type='text/javascript' src={{ asset('js/plugins/charts/jquery.flot.resize.js') }}></script>
    
    <script type='text/javascript' src={{ asset('js/plugins/sparklines/jquery.sparkline.min.js') }}></script>
    
    <script type='text/javascript' src={{ asset('js/plugins/fullcalendar/fullcalendar.min.js') }}></script>
    
    <script type='text/javascript' src={{ asset('js/plugins/select2/select2.min.js') }}></script>
    
    <script type='text/javascript' src={{ asset('js/plugins/uniform/uniform.js') }}></script>
    
    <script type='text/javascript' src={{ asset('{{ asset(plugins/maskedinput/jquery.maskedinput-1.3.min.js') }}></script>
    
    <script type='text/javascript' src={{ asset('js/plugins/validation/languages/jquery.validationEngine-en.js') }} charset='utf-8'></script>
    <script type='text/javascript' src={{ asset('js/plugins/validation/jquery.validationEngine.js') }} charset='utf-8'></script>
    
    <script type='text/javascript' src={{ asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}></script>
    <script type='text/javascript' src={{ asset('js/plugins/animatedprogressbar/animated_progressbar.js') }}></script>
    
    <script type='text/javascript' src={{ asset('js/plugins/qtip/jquery.qtip-1.0.0-rc3.min.js') }}></script>
    
    <script type='text/javascript' src={{ asset('js/plugins/cleditor/jquery.cleditor.js') }}></script>
    
    <script type='text/javascript' src={{ asset('js/plugins/dataTables/jquery.dataTables.min.js') }}></script>    
    
    <script type='text/javascript' src={{ asset('js/plugins/fancybox/jquery.fancybox.pack.js') }}></script>
    
    <script type='text/javascript' src={{ asset('js/cookies.js') }}></script>
    <script type='text/javascript' src={{ asset('js/actions.js') }}></script>
    <script type='text/javascript' src={{ asset('js/charts.js') }}></script>
    <script type='text/javascript' src={{ asset('js/plugins.js') }}></script>

</head>

	@yield('content')

</html>
