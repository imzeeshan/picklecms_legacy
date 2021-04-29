<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    @if(isset($site_title))
          <title>{!! $site_title !!}</title>
      @else
          <title>{{ config('app.name', 'Laravel') }}</title>
    @endif

    @if(isset($site_desc))
          <meta name="description" content="{!! $site_desc !!}"/>
    @endif

  <!-- General CSS Files -->
      <link rel="stylesheet" href="{{ asset('modules/bootstrap/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{ asset('modules/fontawesome/css/all.min.css')}}">
      <link rel="stylesheet" href="{{ asset('modules/bootstrap-social/bootstrap-social.css')}}">


    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/components.css')}}">

    <link rel="shortcut icon" type="image/jpg" href="{{ asset('img/logo-small.png')}}"/>

    @yield('styles')

  </head>

  <body>
  @if (\Request::is('admin*'))
    <div id="app">
      <div class="main-wrapper">
        <div class="navbar-bg"></div>
        @include('layouts.header')
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
             <div class="section-header">
              <h1>Home</h1>
              <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Home</div>
              </div>
            </div>

            @yield('content')
          </section>
        </div>

         @include('layouts.footer')
      </div>
    </div>
  @else
      <div id="app">
          <section class="section">
              <div class="container mt-5">
                  @yield('content')
              </div>
          </section>
      </div>
  @endif


    <!-- General JS Scripts -->
    <script src="{{ asset('modules/jquery.min.js')}}"></script>
    <script src="{{ asset('modules/popper.js')}}"></script>
    <script src="{{ asset('modules/tooltip.js')}}"></script>
    <script src="{{ asset('modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{ asset('modules/moment.min.js')}}"></script>
    <script src="{{ asset('js/stisla.js')}}"></script>

    <!-- Plugins -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js')}}"></script>
    <script src="{{ asset('js/custom.js')}}"></script>

    @yield('scripts')

  </body>
  </html>
