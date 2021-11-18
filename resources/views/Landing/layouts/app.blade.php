<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="Verport" content="width=device-width, initial-scale=1.0">
  <title>Soccer | @yield('title')</title>
    @include("Landing.layouts.lib._style_css")
</head>
<body>
    @include("Landing.layouts.lib._header")
    <!-- header-end -->

    @yield("content")
  
    <!-- footer start -->
    @include("Landing.layouts.lib._footer")
    <!--/ footer end  -->

    <!-- JS here -->
    @include("Landing.layouts.lib._style_js")
</body>
</html>