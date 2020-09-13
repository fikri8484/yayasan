<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Yayasan-Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    @include('includes.admin.style')
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        @include('includes.admin.topbar')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('includes.admin.leftbar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            @yield('content')

            <!-- Footer Start -->
            @include('includes.admin.footer')
            <!-- end Footer -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    @include('includes.admin.script')

</body>

</html>