<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>{{ Route::current()->getName() }}</title>
  <!-- Favicon -->
  <link href="{{asset('assets/images/blue.png')}}" rel="icon" type="image/png">
  <!-- Icons -->
  <link href="{{asset('assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('plugins/iconfonts/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/login/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/login/login.css') }}">
  <!-- end style -->
  @yield('header_js')
</head>
<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          @yield('content') 
        </div>
      </div>
    </div>
  </main>

  <script src="{{asset('plugins/login/jquery.min.js')}}"></script>
  <script src="{{asset('plugins/login/popper.min.js')}}"></script>
  <script src="{{asset('plugins/login/bootstrap.min.js')}}"></script>
  <script>
    var APP_URL={!!json_encode(url('/'))!!};
  </script>
  @yield('js')
</body>
</html>


    
  
