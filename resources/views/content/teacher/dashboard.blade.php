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

    @include('section.teacher.header')

    <!--**********************************
                    Header end ti-comment-alt
                ***********************************-->

    <!--**********************************
                    Sidebar start
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
{{-- 
    @include('section.teacher.slidebar') --}}


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
                {{-- add sugestion --}}
                <div class="col-xl-6 col-xxl-6 col-lg-6">
                    <div class="card">
                    
                        <div class="card-header">
                            <h4 class="card-title">Suggestion</h4>
                        
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{route('add.suggestion') }}" method="POST" enctype="multipart/form-data">@csrf
                                    <div class="form-group">
                                        <div class="col-auto my-1">
                                            <label class="me-sm-2">Department Select</label>
                                            <select name="dept" class="form-control form-control-ms-2" id="inlineFormCustomSelect">
                                                <option selected>Choose...</option>
                                                @foreach($departments as $department)
                                                <option value="{{ $department->name }}">{{ $department->name }}</option>
                                                @endforeach
                                              
                                            </select>

                                            @error('dept')
                                            <div class="text-denger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-auto my-1">
                                            <label class="me-sm-2">Semester Select</label>
                                            <select name="semester" class="form-control form-control-ms-2" id="inlineFormCustomSelect">
                                                <option selected>Choose...</option>
                            
                                                <option value="1st">First Semester</option>
                                                <option value="2nd">Second Semester</option>
                                                <option value="3rd">Third Semester</option>
                                                <option value="4th">Four Semester</option>
                                                <option value="5th">Five Semester</option>
                                                <option value="6th">Six Semester</option>
                                                <option value="7th">Seven Semester</option>
                                             
                                            </select>
                                            @error('semester')
                                            <div class="text-denger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Subject</span>
                                            </div>
                                            <input type="text" name="subject" class="form-control">
                                            @error('subject')
                                            <div class="text-denger">{{ $message }}</div>
                                           @enderror
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
                                                <input type="file" name="files[]" class="dropify form-control" multiple>
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
                </div>
                        {{-- add notice others information --}}
                <div class="col-xl-6 col-xxl-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Notice & Other Info.</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{route('add.notice')}}" method="POST" enctype="multipart/form-data">@csrf
                                    <div class="form-group">
                                        <div class="col-auto my-1">
                                            <label class="me-sm-2">Department Select</label>
                                            <select name="dept" class="form-control form-control-ms-2" id="inlineFormCustomSelect">
                                                <option selected>Choose...</option>
                                                @foreach($departments as $department)
                                                <option value="{{ $department->name }}">{{ $department->name }}</option>
                                                @endforeach
                                              
                                            </select>

                                            @error('dept')
                                            <div class="text-denger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-auto my-1">
                                            <label class="me-sm-2">Semester Select</label>
                                            <select name="semester" class="form-control form-control-ms-2" id="inlineFormCustomSelect">
                                                <option selected>Choose...</option>
                            
                                                <option value="1st">First Semester</option>
                                                <option value="2nd">Second Semester</option>
                                                <option value="3rd">Third Semester</option>
                                                <option value="4th">Four Semester</option>
                                                <option value="5th">Five Semester</option>
                                                <option value="6th">Six Semester</option>
                                                <option value="7th">Seven Semester</option>
                                                <option value="all">All Semester</option>
                                             
                                            </select>
                                            @error('semester')
                                            <div class="text-denger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Department Details</label>
                                        <textarea name="description" class="form-control" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-ekeditor">
                                            <div id="ckeditor"></div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <div class="fallback w-100">
                                                <input type="file" name="file" class="dropify form-control" >
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
                </div>


                {{-- list suggestion --}}
                <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Suggestion</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table verticle-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">dept</th>
                                            <th scope="col">semester</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($suggestions as $suggestion)
                                        <tr>
                                            <td>{{$suggestion->dept}}</td>
                                            <td>{{$suggestion->semester}}</td>
                                            <td>{{$suggestion->subject}}</td>
                                            <td>
                                                <a href="{{route('delete.suggestion',$suggestion->id)}}" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



                {{-- list Notice & Others --}}

                <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Notice</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table verticle-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">dept</th>
                                            <th scope="col">semester</th>
                                            <th scope="col">file</th>
                                            <th scope="col">delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($notices as $notice)
                                        <tr>

                                            <td>{{$notice->dept}}</td>
                                            <td>{{$notice->semester}}</td>
                                            <td>image</td>
                                            <td>
                                               
                                                <a href="{{route('delete.notice', $notice->id) }}" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
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
