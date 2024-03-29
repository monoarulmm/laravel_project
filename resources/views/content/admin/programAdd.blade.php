<base href="/public">

@extends('layouts.admin')
@section('title', 'programsAdd')
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


    @include('section.admin.slidebar')


    <!--**********************************
                Sidebar end
            ***********************************-->

            <div class="content-body">
                <!-- row -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-xxl-3 col-sm-6">
                            <div class="widget-stat card bg-primary">
                                <div class="card-body">
                                    <div class="media">
                                        <span class="me-3">
                                            <i class="la la-users"></i>
                                        </span>
                                        <div class="media-body text-white">
                                            <p class="mb-1">Total Students</p>
                                            <h3 class="text-white">3280</h3>
                                            <div class="progress mb-2 bg-white">
                                                <div class="progress-bar progress-animated bg-light" style="width: 80%"></div>
                                            </div>
                                            <small>80% Increase in 20 Days</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- </div>
                        <div class="col-xl-3 col-xxl-3 col-sm-6">
                            <div class="widget-stat card bg-warning">
                                <div class="card-body">
                                    <div class="media">
                                        <span class="me-3">
                                            <i class="la la-user"></i>
                                        </span>
                                        <div class="media-body text-white">
                                            <p class="mb-1">New Students</p>
                                            <h3 class="text-white">245</h3>
                                            <div class="progress mb-2 bg-white">
                                                <div class="progress-bar progress-animated bg-light" style="width: 50%"></div>
                                            </div>
                                            <small>50% Increase in 25 Days</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-xxl-3 col-sm-6">
                            <div class="widget-stat card bg-secondary">
                                <div class="card-body">
                                    <div class="media">
                                        <span class="me-3">
                                            <i class="la la-graduation-cap"></i>
                                        </span>
                                        <div class="media-body text-white">
                                            <p class="mb-1">Total Course</p>
                                            <h3 class="text-white">28</h3>
                                            <div class="progress mb-2 bg-white">
                                                <div class="progress-bar progress-animated bg-light" style="width: 76%"></div>
                                            </div>
                                            <small>76% Increase in 20 Days</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-xxl-3 col-sm-6">
                            <div class="widget-stat card bg-danger">
                                <div class="card-body">
                                    <div class="media">
                                        <span class="me-3">
                                            <i class="la la-dollar"></i>
                                        </span>
                                        <div class="media-body text-white">
                                            <p class="mb-1">Fees Collection</p>
                                            <h3 class="text-white">25160$</h3>
                                            <div class="progress mb-2 bg-white">
                                                <div class="progress-bar progress-animated bg-light" style="width: 30%"></div>
                                            </div>
                                            <small>30% Increase in 30 Days</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
        
        
                        <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('add.program')}}" method="POST" enctype="multipart/form-data">@csrf
            
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Subject</span>
                                                </div>
                                                <input type="text" name="program" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-ekeditor">
                                                <div id="ckeditor"></div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-lg-6">
                                                <div class="fallback w-100">
                                                    <input type="file" name="image" class="dropify form-control" data-default-file="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <button type="submit" value="submit" class="btn btn-primary float-end">
                                                    Send <i class="far fa-paper-plane"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="card">
                                {{-- <div class="card-header">
                                    <h4 class="card-title">Exam Toppers</h4>
                                </div> --}}
                                <div class="card-header">
                                    <h4 class="card-title">Department List</h4>
                                    <a href="http://127.0.0.1:8000/admin/dashboard/deptAdd" class="btn btn-primary"> + Add Department</a>
                                </div>
                                <div class="card-header">
                                    <h4 class="card-title">Department List</h4>
                                    <a href="http://127.0.0.1:8000/admin/dashboard/deptAdd" class="btn btn-primary"> + Add Department</a>
                                </div>
                                <div class="card-header">
                                    <h4 class="card-title">Department List</h4>
                                    <a href="http://127.0.0.1:8000/admin/dashboard/deptAdd" class="btn btn-primary"> + Add Department</a>
                                </div>
                               
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>



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