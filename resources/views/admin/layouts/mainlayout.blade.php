<!DOCTYPE html>
    <html lang="en">
     <head>     
      <!-- Start Header here -->
          @include('admin.layouts.partials.stylesheet')
      <!-- End Header here -->

      <!-- Start Extra style here -->
          @yield('style') 
       
      <!-- End Extra style here -->
    </head>
    <body>

      <!-- ============================================================== -->
      <!-- Start Content here -->
      <!-- ============================================================== -->
        <!-- <div class="content-page"> -->
             @yield('content')
        <!-- </div> -->
      <!-- ============================================================== -->
      <!-- End content here -->
      <!-- ============================================================== -->

      <!-- Start Footer here-->
          @include('admin.layouts.partials.footer')
      <!-- End Footer here -->

      <!-- Start Script here-->
          @include('admin.layouts.partials.scripts')
      <!-- End Script here -->

      <!-- Start Extra script here -->
          @yield('script')
      <!-- End Extra script here -->
     </body>
    </html>