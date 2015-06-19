<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
	<title>Viclin Owner</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<link rel="icon" type="{{ asset('image/ico') }}" href="favicon.ico"/>
    
    <link href="{{ asset('css/stylesheets.css') }}" rel="stylesheet" type="text/css" />  
    <!--[if lt IE 8]>
        <link href="css/ie7.css" rel="stylesheet" type="text/css" />
    <![endif]-->            
    <link rel='stylesheet' type='text/css' href={{ asset('css/fullcalendar.print.css') }} media='print' />
    
    <script type='text/javascript' src={{ asset('http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js') }}></script>
    <script type='text/javascript' src={{ asset('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js') }}></script>
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
<body>
	<div class="header">
        <a class="logo" href="{{url('/')}}"><img src={{ asset('img/logo.png') }} alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    
    <div class="menu">                
        
        <div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active">
                Hi, Owner
            </div>
        </div>
        
        <div class="admin">
            <div class="image">
                <img src="{{ asset('img/users/aqvatarius.jpg') }}" class="img-polaroid"/>                
            </div>
            <ul class="control">                
                <li><span class="icon-share-alt"></span> <a href="{{ url('/auth/logout') }}">Logout</a></li>
            </ul>
            <div class="info">
                <span>Welcom back! Your last visit: 24.10.2012 in 19:55</span>
            </div>
        </div>
        
        <ul class="navigation">            
            <li class="active">
                <a href="{{ url('owner/dashboard') }}">
                    <span class="isw-grid"></span><span class="text">Dashboard</span>
                </a>
            </li>
            <li class="openable">
                <a href="#">
                    <span class="isw-list"></span><span class="text">Data</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ url('/owner/items') }}">
                            <span class="icon-chevron-right"></span><span class="text">Produk</span>
                        </a>                  
                    </li>          
                    <li>
                        <a href="{{ url('/owner/customers') }}">
                            <span class="icon-chevron-right"></span><span class="text">Customer</span>
                        </a>                  
                    </li>                     
                    <li>
                        <a href="{{ url('/owner/suppliers') }}">
                            <span class="icon-chevron-right"></span><span class="text">Supplier</span>
                        </a>                  
                    </li>   
                    <li>
                        <a href="{{ url('/owner/stock') }}">
                            <span class="icon-chevron-right"></span><span class="text">Stock</span>
                        </a>                  
                    </li>               
                </ul>                
            </li>     
            <li class="openable">
                <a href="#">
                    <span class="isw-list"></span><span class="text">History</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ url('/owner/history/revisisales') }}">
                            <span class="icon-chevron-right"></span><span class="text">History Sales Revision</span>
                        </a>                  
                    </li>          
                    <li>
                        <a href="{{ url('/owner/history/revisipurchase') }}">
                            <span class="icon-chevron-right"></span><span class="text">History Purchase Revision</span>
                        </a>                  
                    </li>                     
                    <li>
                        <a href="{{ url('/owner/history/revisisales') }}">
                            <span class="icon-chevron-right"></span><span class="text">History Sales Retur</span>
                        </a>                  
                    </li>   
                    <li>
                        <a href="{{ url('/owner/history/revisipurchase') }}">
                            <span class="icon-chevron-right"></span><span class="text">History Purchase Retur</span>
                        </a>                  
                    </li>               
                </ul>                
            </li>
            <li class="openable">
                <a href="#">
                    <span class="isw-list"></span><span class="text">Faktur Pembelian</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ url('/owner/purchase/inputfaktur') }}">
                            <span class="icon-chevron-right"></span><span class="text">Input Faktur Pembelian</span>
                        </a>                  
                    </li>          
                    <li>
                        <a href="{{ url('/owner/purchase/revisifaktur') }}">
                            <span class="icon-chevron-right"></span><span class="text">Revisi Faktur Pembelian</span>
                        </a>                  
                    </li>                     
                    <li>
                        <a href="{{ url('/owner/purchase/returperfaktur') }}">
                            <span class="icon-chevron-right"></span><span class="text">Retur Faktur Pembelian</span>
                        </a>                  
                    </li>   
                    <li>
                        <a href="{{ url('/owner/purchase/inputpenyusutan') }}">
                            <span class="icon-chevron-right"></span><span class="text">Input Biaya Penyusutan</span>
                        </a>                  
                    </li>        
                    <li>
                        <a href="{{ url('/owner/purchase/revisipenyusutan') }}">
                            <span class="icon-chevron-right"></span><span class="text">Revisi Biaya Penyusutan</span>
                        </a>                  
                    </li>        
                </ul>     
            </li>        
            <li class="openable">
                <a href="#">
                    <span class="isw-list"></span><span class="text">Laporan</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ url('/owner/report/salesperiod') }}">
                            <span class="icon-chevron-right"></span><span class="text">Laporan Penjualan Per Periode</span>
                        </a>                  
                    </li>          
                    <li>
                        <a href="{{ url('/owner/report/purchaseperiod') }}">
                            <span class="icon-chevron-right"></span><span class="text">Laporan Pembelian Per Periode</span>
                        </a>                  
                    </li>                     
                    <li>
                        <a href="{{ url('/owner/report/profitandlossperiod') }}">
                            <span class="icon-chevron-right"></span><span class="text">Laporan Laba Rugi Per Periode</span>
                        </a>                  
                    </li>               
                </ul>                
            </li>    
              
        </ul>
        
        <div class="dr"><span></span></div>
        
        <div class="widget-fluid">
            <div id="menuDatepicker"></div>
        </div>
        
        <div class="dr"><span></span></div>
        
        <div class="widget">

            <div class="input-append">
                <input id="appendedInputButton" style="width: 118px;" type="text"><button class="btn" type="button">Search</button>
            </div>            
            
        </div>
        
        <div class="dr"><span></span></div>
        
        <div class="widget-fluid">
            
            <div class="wBlock clearfix">
                <div class="dSpace">
                    <h3>Last visits</h3>
                    <span class="number">6,302</span>                    
                    <span>5,774 <b>unique</b></span>
                    <span>3,512 <b>returning</b></span>
                </div>
                <div class="rSpace">
                    <h3>Today</h3>
                    <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--240,234,150,290,310,240,210,400,320,198,250,222,111,240,221,340,250,190--></span>                                                                                
                    <span>&nbsp;</span>
                    <span>65% <b>New</b></span>
                    <span>35% <b>Returning</b></span>
                </div>
            </div>
            
        </div>
        
    </div>
        
    <div class="content">
    

<div class="workplace">
        @yield('content')
</div>
</body>
</html>
