<!DOCTYPE html>
<html>
  @include('_layout.head')
  <body>
    <div class="site">
      <div class="content container py3">
        @include('_layout.header') 
        @yield('content')
      </div>
        @include('_layout.footer')   
    </div>    
 </body>
</html>