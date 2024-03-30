<base href="/public">

@extends('layouts.admin')
@section('title', 'departmentAdd')
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
            @if (session()->has('message'))
            <div class="text-success">
                {{ session()->get('message') }}
            </div>
        @endif



        @if ($errors->any())
            <div class="text-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <!--**********************************
                Sidebar start
            ***********************************-->


    @include('section.admin.slidebar')


    <!--**********************************
                Sidebar end
            ***********************************-->

        	     <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				    
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Add Departments</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Departments</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Departments</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
								<h5 class="card-title">Add Department</h5>
							</div>
							<div class="card-body">
                                <form action="{{route('dept.update.confirm',$department->id)}}" method="POST" enctype="multipart/form-data">@csrf
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Name</label>
												<input type="text" name="name" value="{{$department->name}}"  class="form-control">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Head Of Department</label>
												<input type="text" name="owner" value="{{$department->owner}}" class="form-control">
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Thumbail Image</label>
                                                <input type="file" name="image" class="dropify form-control" data-default-file="">
											</div>
										</div>

                                                            {{-- lab-information-1 --}}
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Lab 1 Image</label>
                                                <input type="file" name="lab1" class="dropify form-control" data-default-file="">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Lab 1 Shortdesc</label>
												<input type="text" name="shortdesc1" class="form-control">
											</div>
										</div>
                                                            {{-- lab-information-2 --}}
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Lab 2 Image</label>
                                                <input type="file" name="lab2" class="dropify form-control" data-default-file="">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Lab 2 Shortdesc</label>
												<input type="text" name="shortdesc2" class="form-control">
											</div>
										</div>
                                                            {{-- lab-information-3 --}}
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Lab 3 Image</label>
                                                <input type="file" name="lab3" class="dropify form-control" data-default-file="">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Lab 3 Shortdesc</label>
												<input type="text" name="shortdesc3" class="form-control">
											</div>
										</div>
                                                            {{-- lab-information-4 --}}
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Lab 4 Image</label>
                                                <input type="file" name="lab4" class="dropify form-control" data-default-file="">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Lab 4 Shortdesc</label>
												<input type="text" name="shortdesc4" class="form-control">
											</div>
										</div>
                                                            {{-- lab-information-5 --}}
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Lab 5 Image</label>
                                                <input type="file" name="lab5" class="dropify form-control" data-default-file="">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Lab 5 Shortdesc</label>
												<input type="text" name="shortdesc5" class="form-control">
											</div>
										</div>


										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Details</label>
												<textarea name="description" class="form-control" rows="5"></textarea>
											</div>
										</div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Teacher 1</label>
                                                <input type="file" name="teacher1" class="dropify form-control" data-default-file="">
											</div>
										</div><div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Teacher 2</label>
                                                <input type="file" name="teacher2" class="dropify form-control" data-default-file="">
											</div>
										</div><div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Teacher 3</label>
                                                <input type="file" name="teacher3" class="dropify form-control" data-default-file="">
											</div>
										</div><div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Department Teacher 4</label>
                                                <input type="file" name="teacher4" class="dropify form-control" data-default-file="">
											</div>
										</div>
									
										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" value="submit" class="btn btn-primary">Submit</button>
											<button type="reset" class="btn btn-light">Cencel</button>
										</div>
									</div>
								</form>
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