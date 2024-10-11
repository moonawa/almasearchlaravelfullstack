<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('admin/img/logoicon.png') }}" sizes="50x50">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Alma Search
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('admin/demo/demo.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/moonawa.css') }}" rel="stylesheet">

</head>

<body class="">
  <div class="wrapper ">
    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- End of Sidebar -->

    <div class="main-panel">
 

      <!-- Topbar -->
      @include('layouts.navbar')
        <!-- End of Topbar -->


        <div class="content">

        @yield('contents')

        </div>
      

        <!-- Footer -->
      @include('layouts.footer')
      <!-- End of Footer -->

      </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <script src="{{ asset('admin/js/moonawa.js') }}"></script>
      <script src="{{ asset('admin/js/core/jquery.min.js') }}"></script>
      <script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
      <script src="{{ asset('admin/js/core/bootstrap.min.js') }}"></script>
      <script src="{{ asset('admin/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

  <!--  Google Maps Plugin    -->

  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

  <script src="{{ asset('admin/js/plugins/chartjs.min.js') }}"></script>
      <script src="{{ asset('admin/js/plugins/bootstrap-notify.js') }}"></script>
      <script src="{{ asset('admin/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript" ></script>
      <script src="{{ asset('admin/demo/demo.js') }}"></script>
 
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>
