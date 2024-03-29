<!DOCTYPE html>
<html lang="en">


<head>

<link rel="icon" type="image/png" sizes="16x16" href="admin/images/favicon1.png">
    <link rel="stylesheet" href="admin/vendor/jqvmap/css/jqvmap.min.css">
    <link rel="stylesheet" href="admin/vendor/chartist/css/chartist.min.css">
    <!-- Summernote -->
    <link rel="stylesheet" href="admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="admin/css/style.css">
    <link rel="stylesheet" href="admin/css/skin-3.css">
    <title>@yield('title')</title>

</head>

<body>

  <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
<div id="main-wrapper">

   @yield('content')

<!--**********************************
    Nav header start
***********************************-->

<!--**********************************
    Nav header end
***********************************-->

<!--**********************************
    Header start
***********************************-->

<!--**********************************
    Header end ti-comment-alt
***********************************-->

<!--**********************************
    Sidebar start
***********************************-->

<!--**********************************
    Sidebar end
***********************************-->




<!--**********************************
    Footer start
***********************************-->

<!--**********************************
    Footer end
***********************************-->

<!--**********************************
   Support ticket button start
***********************************-->

<!--**********************************
   Support ticket button end
***********************************-->


</div>

         <!-- Required admin/vendors -->
         <script src="admin/vendor/global/global.min.js"></script>
    <script src="admin/js/deznav-init.js"></script>
    <script src="admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

    <!-- Chart sparkline plugin files -->
    <script src="admin/vendor/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="admin/js/plugins-init/sparkline-init.js"></script>

    <!-- Chart Morris plugin files -->
    <script src="admin/vendor/raphael/raphael.min.js"></script>
    <script src="admin/vendor/morris/morris.min.js"></script>

    <script src="admin/vendor/ckeditor/ckeditor.js"></script>

    <!-- Init file -->
    <script src="admin/js/plugins-init/widgets-script-init.js"></script>

    <!-- Demo scripts -->
    <script src="admin/js/dashboard/dashboard.js"></script>
    <script src="admin/js/custom.min.js"></script>


    <!-- Svganimation scripts -->
    <script src="admin/vendor/svganimation/vivus.min.js"></script>
    <script src="admin/vendor/svganimation/svg.animation.js"></script>

</body>

</html>