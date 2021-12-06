<!-- include css link  -->
@include('Admin/Includes/Partials/header')


<div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        @include('Admin/Includes/Partials/sidebar')

        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
        <!-- HEADER DESKTOP-->
        @include('Admin/Includes/Partials/header_menu')


        <!-- page header title -->
        @yield('page_header')
        <!-- page header title -->

        <!-- per page content -->

        @yield('content')

        <!-- per page content -->

  

    <!-- include js link -->
 @include('Admin/Includes/Partials/footer')
 