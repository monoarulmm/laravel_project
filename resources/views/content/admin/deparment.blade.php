<base href="/public">

@extends('layouts.admin')
@section('title', 'courses')
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

            @if (session()->has('message'))
            <div class="text-green-400">
                {{ session()->get('message') }}
            </div>
        @endif



        @if ($errors->any())
            <div class="text-red-900">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
 
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				    
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>All department</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Courses</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">All Courses</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">

                    @foreach ($departments as $department)
					<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6">
						<div class="card">
							<img class="img-fluid"   src="/storage/department/{{ $department->image }}" alt="image">
							<div class="card-body">
								<h4>{{$department->department}}</h4>
							
								<a href="{{route('delete.dept', $department->id) }}" class="btn btn-danger">Delete</a>
							</div>
						</div>
					</div>
                    @endforeach
				
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