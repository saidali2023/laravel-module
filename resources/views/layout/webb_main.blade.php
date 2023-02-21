


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
  @include('layout.webb_head')
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
      @include('layout.webb_nav')
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    @include('layout.webb_sidbar')
  </div>


  <div class="app-content content">
    <div class="content-wrapper">
      
      <div class="content-body">
      	@yield('content')
        <!-- Configuration option table -->
       
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
    @include('layout.webb_footer')
</body>
</html>




