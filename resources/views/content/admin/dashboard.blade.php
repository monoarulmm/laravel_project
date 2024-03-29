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
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-primary">
                        <div class="card-body">
                            <div class="media">
                                <span class="me-3">
                                    <i class="la la-users"></i>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Total Students</p>
                                    <h3 class="text-white">{{$totalstudents}}</h3>
                                    <div class="progress mb-2 bg-white">
                                        <div class="progress-bar progress-animated bg-light" style="width: 80%"></div>
                                    </div>
                                    <small>80% Increase in 20 Days</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-warning">
                        <div class="card-body">
                            <div class="media">
                                <span class="me-3">
                                    <i class="la la-user"></i>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Total Teacher</p>
                                    <h3 class="text-white">{{$totalteachers}}</h3>
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
                                    <p class="mb-1">Total Course DIST TTC</p>
                                    <h3 class="text-white">10</h3>
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
                    <div class="widget-stat card bg-secondary">
                        <div class="card-body">
                            <div class="media">
                                <span class="me-3">
                                    <i class="la la-graduation-cap"></i>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Total Department</p>
                                    <h3 class="text-white">8</h3>
                                    <div class="progress mb-2 bg-white">
                                        <div class="progress-bar progress-animated bg-light" style="width: 76%"></div>
                                    </div>
                                    <small>76% Increase in 20 Days</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          


                <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Program</h4>
							<a href="{{route('program.All')}}" class="btn btn-primary">Al Program</a>
						</div>
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
                            <a href="{{route('dept.All')}}"><h4 class="card-title">Department List</h4></a>	
							<a href="{{route('dept.Add')}}" class="btn btn-primary"> + Add Department</a>
						</div>
						<div class="card-header">
							<a href="{{route('course.All')}}"><h4 class="card-title">TTC Course List</h4></a>
							<a href="{{route('course.Add')}}" class="btn btn-primary"> + Add Course</a>
						</div>
						
                       
                    </div>
                </div>
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

                                     @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->usertype}}</td>

                                            <td>
                      
                                                @if($user->usertype == 'student')
                                                  <a onclick="return confirm('Are Your make a teacher')" class="btn btn-sm btn-primary" href="{{route('teacher',$user->id)}}">teacher</a>
                                            
                                                  @else
                                                    <h1 style="color:aqua">teacher</h1>
                                            
                                                  @endif
                                            
                                                </td>
                                            {{-- <td><span class="badge badge-rounded badge-primary">Checkin</span></td> --}}
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
