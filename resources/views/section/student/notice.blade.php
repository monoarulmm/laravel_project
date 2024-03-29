  <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				    
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>All notice</h4>
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

                    @foreach ($notices as $notice)
					<div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6">
						<div class="card">
							<img class="img-fluid"   src="/storage/notice/{{ $notice->image }}" alt="image">
							<div class="card-body">
								<h4>{{$notice->name}}</h4>
						
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