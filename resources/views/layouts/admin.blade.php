<!DOCTYPE html>
<html lang="en">
 @include('layouts.head')
</head>
<body class="">
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    @include('layouts.sidebar')
    <div class="main-panel">
      <!-- Navbar -->
      @include('layouts.navbar')
      <!-- End Navbar -->
      <div class="content">
          @include('layouts.notifications')
          @yield('content')
          
      
      
        @include('layouts.footer')
      
    </div>
  </div>

      {{--  Sidebar Filters --}}
    @include('layouts.filters')
      {{--  End Sidebar Filters --}}
 
    @include('layouts.scripts')
</body>
</html>