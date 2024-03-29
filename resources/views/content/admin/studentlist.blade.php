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

    @include('section.admin.header')

    <!--**********************************
                Header end ti-comment-alt
            ***********************************-->

    <!--**********************************
                Sidebar start
            ***********************************-->


    {{-- @include('section.admin.slidebar') --}}


    <!--**********************************
                Sidebar end
            ***********************************-->

    <!--**********************************
                Content body start
            ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
               
                <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">New Student List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive recentOrderTable">
                                <table class="table verticle-middle table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Assigned Professor</th>
                                            <th scope="col">Date Of Admit</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Fees</th>
                                            <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($students as $user)
                                        <tr>
                                            <td>01</td>
                                            <td>{{$user->name}}</td>
                                            <td>Airi Satou</td>
                                            <td>01 August 2022</td>
                                            <td><span class="badge badge-rounded badge-primary">Checkin</span></td>
                                            <td>Commerce</td>
                                            <td>120$</td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary"><i
                                                        class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                        class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
