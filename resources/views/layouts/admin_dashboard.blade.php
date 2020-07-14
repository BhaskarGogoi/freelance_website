<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Bhaskarjyoti Gogoi">
  <link rel="icon" type="image/png" href="../images/favicon.png">
  <title>
    @yield('title')
  </title>
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../css/style.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="/">
          Serve Anything
        </a>
      </div>
    
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ '/admin-dashboard' == request()->path() ? 'active' : ''}}" href="/admin-dashboard">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link  {{'/bookings/All' == request()->path() ? 'active' : ''}}" href="/bookings/All">
                <i class="fas fa-shopping-cart" style="color: #0A79DF;"></i>
                <span class="nav-link-text">Bookings</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                  <i class="fas fa-plus-circle" style="color: #f4645f;"></i>
                  <span class="nav-link-text" >Insert</span>
              </a>

              <div class="collapse" id="navbar-examples">
                  <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a class="nav-link  {{ 'category' == request()->path() ? 'active' : ''}}" href="/category">
                          <span class="nav-link-text">Category</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link  {{ 'packages' == request()->path() ? 'active' : ''}}" href="/packages">
                          <span class="nav-link-text">Packages</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link  {{ 'package-item' == request()->path() ? 'active' : ''}}" href="/package-item">
                          <span class="nav-link-text">Package Item</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link  {{ 'city' == request()->path() ? 'active' : ''}}" href="/city">
                          <span class="nav-link-text">City</span>
                        </a>
                      </li>
                  </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#home_service" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                  <i class="fas fa-user-alt" style="color: #8B78E6;"></i>
                  <span class="nav-link-text">Home Service Profiles</span>
              </a>
              <div class="collapse" id="home_service">
                  <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a class="nav-link  {{ '/job-profiles-new' == request()->path() ? 'active' : ''}}" href="/job-profiles-new">
                          <span class="nav-link-text">New</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link  {{ '/job-profiles-accepted' == request()->path() ? 'active' : ''}}" href="/job-profiles-accepted">
                          <span class="nav-link-text">Accepted</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link  {{ '/job-profiles-rejected' == request()->path() ? 'active' : ''}}" href="/job-profiles-rejected">
                          <span class="nav-link-text">Rejected</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link  {{ '/job-profiles-disqualified' == request()->path() ? 'active' : ''}}" href="/job-profiles-disqualified">
                          <span class="nav-link-text">Disqualified</span>
                        </a>
                      </li>
                  </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link  {{'/create-invoice' == request()->path() ? 'active' : ''}}" href="/create-invoice">
                <i class="fas fa-file-invoice-dollar" style="color: #E74292;"></i>
                <span class="nav-link-text">Generate Invoice</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link  {{'/feedbacks' == request()->path() ? 'active' : ''}}" href="/feedbacks">
                <i class="far fa-comment-alt" style="color: #1BCA9B;"></i>
                <span class="nav-link-text">Feedback</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link  {{'/notify' == request()->path() ? 'active' : ''}}" href="/notify">
                <i class="far fa-bell" style="color: #E83350;"></i>
                <span class="nav-link-text">Notify Me</span>
              </a>
            </li>
          </ul>
          {{-- <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Other</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Link</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ni ni-palette"></i>
                <span class="nav-link-text">Link</span>
              </a>
            </li>             --}}
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          {{-- <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form> --}}
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="../images/profile.png">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{ Auth::User()->name }} </span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                {{-- <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a> --}}
                <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>    
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  
      <!-- Header -->    
        @yield('content')  
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="/" class="font-weight-bold ml-1">serveanything.in</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="/" class="nav-link" >Home</a>
              </li>
              <li class="nav-item">
                <a href="/aboutus" class="nav-link" >About</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">Category</a>
              </li>             
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>
</html>