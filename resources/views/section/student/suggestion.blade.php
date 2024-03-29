<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
            
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>All suggestion</h4>
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

            @foreach ($suggestions as $suggestion)
            <div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="card">
                    <img class="img-fluid"   src="/storage/suggestion/{{ $suggestion->image }}" alt="image">
                    <div class="card-body">
                     
                    <h1>{{$suggestion->subject}}</h1>
                    <h1>{{$suggestion->name}}</h1>
                        
                    </div>
                </div>
            </div>
            @endforeach
        
        </div>
        
    </div>
</div>