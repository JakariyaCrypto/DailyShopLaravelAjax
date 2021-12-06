
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2021 Shop Gore. All rights reserved Here by <a href="https://colorlib.com">Shop Gore</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END PAGE CONTAINER-->
    </div>

    </div>

    <!-- Jquery -->
    <script src="{{ asset('Admin_assets/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap-->
    <script src="{{ asset('Admin_assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{ asset('Admin_assets/js/noty.min.js')}}"></script>
    <script src="{{ asset('Admin_assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor       -->
    <script src="{{ asset('Admin_assets/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{ asset('Admin_assets/vendor/wow/wow.min.js')}}"></script>
    <script src="{{ asset('Admin_assets/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{ asset('Admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{ asset('Admin_assets/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('Admin_assets/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{ asset('Admin_assets/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{ asset('Admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('Admin_assets/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{ asset('Admin_assets/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main -->
    <script src="{{ asset('Admin_assets/js/main.js')}}"></script>
<!-- noty message for backend -->
@if(session('message'))    
    <script>
    new Noty({
        theme:'nest',
        type:'success',
        timeout:2000,
        layout:'topRight',
        text: "{{session('message')}}",
        
    }).show();
</script>
@endif

@if(session('warning'))    
    <script>
    new Noty({
        theme:'nest',
        type:'warning',
        timeout:2000,
        layout:'topRight',
        text: "{{session('warning')}}",
        
    }).show();
</script>
@endif

<!-- noty message for backend -->
</body>

</html>
<!-- end document-->