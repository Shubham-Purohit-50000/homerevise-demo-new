@extends('backend.layout')
@section('title','Dashbord')
@section('content')

<style>
    .left-border{
        border-left: 3px solid;
    }
    .info_card h3{
        font-size: 1.2rem;
    }
</style>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Dashboard</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">

        <div class="row">

           <!--  <div class="col-6 col-md-3 col-lg-2 text-center">
                <a href="{{url('admin/states')}}">
                    <div class="card p-2">
                        <div class="card-body">
                            <h3 class="text-success">State</h3>
                            <h5 class="mdi mdi-account text-dark"> {{App\Models\State::count()}}</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3 col-lg-2 text-center">
                <a href="{{url('admin/boards')}}">
                    <div class="card p-2">
                        <div class="card-body">
                            <h3 class="text-success">Board</h3>
                            <h5 class="mdi mdi-account text-dark"> {{App\Models\Board::count()}}</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3 col-lg-2 text-center">
                <a href="{{url('admin/mediums')}}">
                    <div class="card p-2">
                        <div class="card-body">
                            <h3 class="text-success">Mediums</h3>
                            <h5 class="mdi mdi-account text-dark"> {{App\Models\Medium::count()}}</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3 col-lg-2 text-center">
                <a href="{{url('admin/standards')}}">
                    <div class="card p-2">
                        <div class="card-body">
                            <h3 class="text-success">Standards</h3>
                            <h5 class="mdi mdi-account text-dark"> {{App\Models\Standard::count()}}</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3 col-lg-2 text-center">
                <a href="{{url('admin/subjects')}}">
                    <div class="card p-2">
                        <div class="card-body">
                            <h3 class="text-success">Subjects</h3>
                            <h5 class="mdi mdi-account text-dark"> {{App\Models\Subject::count()}}</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3 col-lg-2 text-center">
                <a href="{{url('admin/chapters')}}">
                    <div class="card p-2">
                        <div class="card-body">
                            <h3 class="text-success">Chapters</h3>
                            <h5 class="mdi mdi-account text-dark"> {{App\Models\Chapter::count()}}</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3 col-lg-2 text-center">
                <a href="{{url('admin/topics')}}">
                    <div class="card p-2">
                        <div class="card-body">
                            <h3 class="text-success">Topics</h3>
                            <h5 class="mdi mdi-account text-dark"> {{App\Models\Topic::count()}}</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3 col-lg-2 text-center">
                <a href="{{url('admin/subtopics')}}">
                    <div class="card p-2">
                        <div class="card-body">
                            <h3 class="text-success">Sub-Topics</h3>
                            <h5 class="mdi mdi-account text-dark"> {{App\Models\Subtopic::count()}}</h5>
                        </div>
                    </div>
                </a>
            </div>
 -->
            <div class="col-6 col-md-3 col-lg-2 text-center">
                <a href="{{url('admin/courses')}}">
                    <div class="card p-2">
                        <div class="card-body">
                            <h3 class="text-success">Courses</h3>
                            <h5 class="mdi mdi-account text-dark"> {{App\Models\Course::count()}}</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3 col-lg-2 text-center">
                <a href="{{url('admin/users')}}">
                    <div class="card p-2">
                        <div class="card-body">
                            <h3 class="text-success">Users</h3>
                            <h5 class="mdi mdi-account text-dark"> {{App\Models\User::count()}}</h5>
                        </div>
                    </div>
                </a>
            </div>

        </div>
        
    </div>
    
</div>
@endsection