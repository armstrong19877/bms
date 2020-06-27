<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Bright Brains Royal Academy</title>

  <!-- Bootstrap CSS -->
  <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{ asset('css/bootstrap-theme.css')}}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{ asset('css/elegant-icons-style.css')}}" rel="stylesheet" />
  <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{ asset('css/fullcalendar.css')}}">
  <link href="{{ asset('css/widgets.css')}}" rel="stylesheet">
  <link href="{{ asset('css/style.css')}}" rel="stylesheet">
  <link href="{{asset ('css/style-responsive.css')}}" rel="stylesheet" />
  <link href="{{ asset('css/xcharts.min.css')}}" rel=" stylesheet">
  <link href="{{ asset('css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css1/app.css') }}" rel="stylesheet">
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo">Bright Brians <span class="lite">Academy</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul>
        <!--  search form end -->
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          
          <!-- inbox notificatoin start-->
          
         
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
          <img style="background-repeat: no-repeat; background-attachment: fixed;" src="{{asset('movements/' .Auth::user()->image)}}" width="60px" height="60" alt="image">
                            </span>
                            <span class="username">{{ Auth::user()->name }}</span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="{{route('scholar.show', Auth::user()->name)}}"><i class="icon_profile"></i> My Profile</a>
              </li>
              <li>
                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
              </li>
              <li>

                          <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon_key_alt"></i>
                                        {{ __('Logout') }}
                                    </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                  
                                    </form>
                                                  
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="{{ route('home') }}">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          @hasrole('admin')
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Manage Users</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{ route('register') }}">Register Student</a></li>
              <li><a class="" href="{{route('admin.users.index')}}">Manage Users</a></li>
              <li><a class="" href="{{route('register.student')}}">Register new Student</a></li>
              <li><a class="" href="{{route('student.list')}}">Student List</a></li>
            </ul>
          </li>
          @endhasrole


           @hasrole('admin')
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Manage Teachers</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{ route('register.teacher') }}">Register Teacher</a></li>
              <li><a class="" href="{{route('admin.users.index')}}">Manage Users</a></li>
              <li><a class="" href="{{route('register.student')}}">Register new Student</a></li>
              <li><a class="" href="{{route('teacher.list')}}">Teachers' List</a></li>
            </ul>
          </li>
          @endhasrole



          @hasrole('scholar')
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>My Details</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{route('scholar.show', Auth::user()->name)}}">Personal Information</a></li>
             <li><a class="" href="/check/result">My Result</a></li>
              <li><a class="" href="{{route('scholar.edit', Auth::user()->name)}}">Edit Account</a></li>
              <li><a class="" href="grids.html">Grids</a></li>  
            </ul>
          </li>
          @endhasrole

          <li>
            <a class="" href="widgets.html">
                          <i class="icon_genius"></i>
                          <span>Widgets</span>
               </a>
          </li>
          <li>
            <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>Charts</span>
               </a>
          </li>

          @hasrole('admin')
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Manage Student</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{ route('create.class') }}">Create Class</a></li>
              <li><a class="" href="{{route('register.student')}}">Register new Student</a></li>
              <li><a class="" href="{{route('result.index')}}">Create Result</a></li>
              <li><a class="" href="{{route('student.list')}}">Student List</a></li>
            </ul>
          </li>
          @endhasrole

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Pages</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="profile.html">Profile</a></li>
              <li><a class="" href="login.html"><span>Login Page</span></a></li>
              <li><a class="" href="contact.html"><span>Contact Page</span></a></li>
              <li><a class="" href="blank.html">Blank Page</a></li>
              <li><a class="" href="404.html">404 Error</a></li>
            </ul>
          </li>


          
           @hasrole('teacher')
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Teacher Detail</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{ route('staff.show', Auth::user()->name) }}">Personal Details</a></li>
              <li><a class="" href="{{route('staff.edit', Auth::user()->name)}}">Edit Details</a></li>
              <li><a class="" href="{{route('register.student')}}">Register new Student</a></li>
              <li><a class="" href="{{route('teacher.list')}}">Teachers' List</a></li>
            </ul>
          </li>
          @endhasrole

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

        <div class="row">

          
          <!--/col-->
         @yield('content')

       </div>

      </section>

    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="{{ asset('js/jquery.js')}}"></script>
  <script src="{{ asset('js/jquery-ui-1.10.4.min.js')}}"></script>
  <script src="{{ asset('js/jquery-1.8.3.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <!-- bootstrap -->
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>
  <!-- nice scroll -->
  <script src="{{ asset('js/jquery.scrollTo.min.js')}}"></script>
  <script src="{{ asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="{{ asset('assets/jquery-knob/js/jquery.knob.js')}}"></script>
  <script src="{{ asset('js/jquery.sparkline.js')}}" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="{{ asset('js/owl.carousel.js')}}"></script>
  <!-- jQuery full calendar -->
  <<script src="{{ asset('js/fullcalendar.min.js')}}"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="{{ asset('js/calendar-custom.js')}}"></script>
    <script src="{{ asset('js/jquery.rateit.min.js')}}"></script>
    <!-- custom select -->
    <script src="{{ asset('js/jquery.customSelect.min.js')}}"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->

    

    <script src="{{ asset('js/scripts.js')}}"></script>
    <!-- custom script for this page-->
    <script src="{{ asset('js/sparkline-chart.js')}}"></script>
    <script src="{{ asset('js/easy-pie-chart.js')}}"></script>
    <script src="{{ asset('js/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{ asset('js/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ asset('js/xcharts.min.js')}}"></script>
    <script src="{{ asset('js/jquery.autosize.min.js')}}"></script>
    <script src="{{ asset('js/jquery.placeholder.min.js')}}"></script>
    <script src="{{ asset('js/gdp-data.js')}}"></script>
    <script src="{{ asset('js/morris.min.js')}}"></script>
    <script src="{{ asset('js/sparklines.js')}}"></script>
    <script src="{{ asset('js/charts.js')}}"></script>
    <script src="{{ asset('js/jquery.slimscroll.min.js')}}"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>
