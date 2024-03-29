<base href="/public">

@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')


    <!--**********************************
                Nav header start
            ***********************************-->
    <div class="nav-header">
        <a href="index.html" class="brand-logo">
            <img class="logo-abbr" src="images/logo-white-2.png" alt="">
            <img class="logo-compact" src="images/logo-text-white.png" alt="">
            <img class="brand-title" src="images/logo-text-white.png" alt="">
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
                Nav header end
            ***********************************-->

    <!--**********************************
                Header start
            ***********************************-->

    @include('section.student.header')

    <!--**********************************
                Header end ti-comment-alt
            ***********************************-->

    <!--**********************************
                Sidebar start
            ***********************************-->


    @include('section.student.slidebar')


    <!--**********************************
                Sidebar end
            ***********************************-->

    <!--**********************************
                Content body start
            ***********************************-->
 
      @include('section.student.notice')

    <!--**********************************
                Content body end
            ***********************************-->


    <!--**********************************
                Footer start
            ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">DexignZone</a> 2022</p>
        </div>
    </div>
    <!--**********************************
                Footer end
            ***********************************-->

    <!--**********************************
               Support ticket button start
            ***********************************-->

    <!--**********************************
               Support ticket button end
            ***********************************-->



@endsection
