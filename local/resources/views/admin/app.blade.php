<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
	<title>Viclin Admin</title>
    
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
    
    <script type='text/javascript' src={{ asset('js/plugins/maskedinput/jquery.maskedinput-1.3.min.js') }}></script>
    
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
<body>
	<div class="header">
        <!-- <a class="logo" href="{{url('/')}}"><img src={{ asset('img/logo.png') }} alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a> -->
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    
    <div class="menu">                
        
        <div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active">
                Hi, Admin
            </div>
        </div>
        
        <div class="admin">
            <div class="image">
                <img src="{{ asset('img/users/administrator.png') }}" class="img-polaroid"/>                
            </div>
            <ul class="control">                
                <li><span class="icon-share-alt"></span> <a href="{{ url('/auth/logout') }}">Logout</a></li>
            </ul>
        </div>
        
        <ul class="navigation">            
            <li>
                <a href="{{ url('admin/dashboard') }}">
                    <span class="isw-grid"></span><span class="text">Dashboard</span>
                </a>
            </li>
            <li class="openable 
                        @if(str_contains(Request::url(), 'admin/customers') ||
                            str_contains(Request::url(), 'admin/items') ||
                            str_contains(Request::url(), 'admin/employees')) {{ 'active' }}  @endif">
                <a href="#">
                    <span class="isw-list"></span><span class="text">Data</span>
                </a>
                <ul>
                    <li>
                        <a href="{{url('admin/customers/create')}}">
                            <span class="icon-chevron-right"></span><span class="text">Input Customer</span>
                        </a>                  
                    </li>          
                    <li>
                        <a href="{{url('admin/customers')}}">
                            <span class="icon-chevron-right"></span><span class="text">View Customer</span>
                        </a>                  
                    </li>                     
                    <li>
                        <a href="{{url('admin/items')}}">
                            <span class="icon-chevron-right"></span><span class="text">Stock</span>
                        </a>                  
                    </li>  
                    <li>
                        <a href="{{url('admin/employees')}}">
                            <span class="icon-chevron-right"></span><span class="text">Employees</span>
                        </a>                  
                    </li>               
                </ul>                
            </li>     
            <li class="openable @if(str_contains(Request::url(), 'admin/sales')) {{ 'active' }}  @endif">
                <a href="#">
                    <span class="isw-list"></span><span class="text">Sales</span>
                </a>
                <ul>
                    <li>
                        <a href="{{url('admin/sales/inputfaktur')}}">
                            <span class="icon-chevron-right"></span><span class="text">Input Invoice</span>
                        </a>                  
                    </li>          
                    <li>
                        <a href="{{url('admin/sales/cetakfaktur')}}">
                            <span class="icon-chevron-right"></span><span class="text">Print Invoice</span>
                        </a>                  
                    </li>                     
                    <li>
                        <a href="{{url('admin/sales/revisifaktur')}}">
                            <span class="icon-chevron-right"></span><span class="text">Revision Invoice</span>
                        </a>                  
                    </li>   <!-- 
                    <li>
                        <a href="{{url('admin/sales/returperfaktur')}}">
                            <span class="icon-chevron-right"></span><span class="text">Retur Per Faktur Penjualan</span>
                        </a>                  
                    </li>      -->   
                    <li>
                        <a href="{{url('admin/sales/paymentconfirmation')}}">
                            <span class="icon-chevron-right"></span><span class="text">Payment Confirmation</span>
                        </a>                  
                    </li>  
                    <li>
                        <a href="{{url('admin/sales/inputpenyusutan')}}">
                            <span class="icon-chevron-right"></span><span class="text">Input Depreciation Cost</span>
                        </a>                  
                    </li>        
                    <li>
                        <a href="{{url('admin/sales/revisipenyusutan')}}">
                            <span class="icon-chevron-right"></span><span class="text">Revision Depreciation Cost</span>
                        </a>                  
                    </li>  
                    <li>
                        <a href="{{url('admin/sales/cetaksuratjalan')}}">
                            <span class="icon-chevron-right"></span><span class="text">Print Travel Document</span>
                        </a>                  
                    </li>  
                </ul>     
            </li>        
            <li class="openable @if(str_contains(Request::url(), 'admin/cost') || 
                                    str_contains(Request::url(), 'admin/salaries') ) {{ 'active' }}  @endif">
                <a href="#">
                    <span class="isw-list"></span><span class="text">Operating Costs</span>
                </a>
                <ul>
                    <li>
                        <a href="{{url('admin/costs/create')}}">
                            <span class="icon-chevron-right"></span><span class="text">Input Cost</span>
                        </a>                  
                    </li>          
                    <li>
                        <a href="{{url('admin/costs')}}">
                            <span class="icon-chevron-right"></span><span class="text">View Cost</span>
                        </a>                  
                    </li>  
                    <li>
                        <a href="{{url('admin/salaries/create')}}">
                            <span class="icon-chevron-right"></span><span class="text">Input Salary</span>
                        </a>                  
                    </li>  
                    <li>
                        <a href="{{url('admin/salaries')}}">
                            <span class="icon-chevron-right"></span><span class="text">View Salary</span>
                        </a>                  
                    </li>                   
                </ul>                
            </li>   
            <li class="openable @if(str_contains(Request::url(), 'admin/setting')) {{ 'active' }}  @endif">
                <a href="#">
                    <span class="isw-list"></span><span class="text">Setting</span>
                </a>
                <ul>
                    <li>
                        <a href="{{url('admin/setting/changepassword')}}">
                            <span class="icon-chevron-right"></span><span class="text">Change Password</span>
                        </a>                  
                    </li>                         
                </ul>                
            </li>  
              
        </ul>
        
        <div class="dr"><span></span></div>
        
        <div class="widget-fluid">
            <div id="menuDatepicker"></div>
        </div>
        
    </div>
        
    <div class="content">
        
        
        

<div class="workplace">
        @yield('content')
</div>
</body>
</html>
