@extends('backend.layout')
@section('title','Dashbord')
@section('content')
@php
    use Carbon\Carbon;
@endphp

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">User Details</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">user-detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-7">
                <div class="text-end upgrade-btn">
                    <a href="{{url('admin/user/deregister/device', ['user'=>$user->id])}}" class="btn btn-danger text-white" onclick="return confirmDelete('Are you sure you want to remove registered device from user account? This action cannot be undone.')">Remove Register Device</a>
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
            <!-- column -->
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="text-center p-3">
                            <div>
                                <h4 class="card-title">User Profile</h4>
                            </div>
                            <div id="profile_img my-2">
                                <img src="{{asset('storage/'.$user->image )}}" alt="" class="rounded-circle shadow" style="width:120px;height:120px;">
                            </div>
                            <div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>Name</div>
                                    <div>{{$user->name}}</div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>Email</div>
                                    <div>{{$user->email}}</div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>Phone</div>
                                    <div>{{$user->phone}}</div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>Address</div>
                                    <div>{{$user->address}}</div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>Standard</div>
                                    <div>{{$user->standard}}</div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>Registered Device</div>
                                    <div>{{$user->device_id}}</div>
                                </li>
                            </ul>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex">
                            <div>
                                <h4 class="card-title">User Course List</h4>
                                <h5 class="card-subtitle">Overview of all user courses</h5>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="table-responsive">
                        <table class="table v-middle">
                            <thead>
                                <tr class="bg-light">
                                    <th class="border-top-0">#C_ID</th>
                                    <th class="border-top-0">C Name</th>
                                    <th class="border-top-0">C Duration</th>
                                    <th class="border-top-0">Expended Days</th>
                                    <th class="border-top-0">Expire Date</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($activations as $activation)
                                <tr>
                                    <td>{{$activation->course->id}}</td>
                                    <td>{{$activation->course->name}}</td>
                                    <td>{{$activation->course->duration}}</td>
                                    <td>{{$user->course_extended_days}}</td>
                                    <td>
                                        <?php
                                            $givenDatetime = Carbon::parse($activation->activation_time);
                                            $futureDatetime = $givenDatetime->addMonths($activation->course->duration);
                                            if($user->course_extended_days !== null){
                                                $futureDatetime = $givenDatetime->addDays($user->course_extended_days);
                                            }
                                            $futureDatetimeFormatted = $futureDatetime->format('Y-M-d h:i:s a');
                                        ?>
                                        {{$futureDatetimeFormatted}}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal_{{$activation->id}}">
                                            <span class="mdi mdi-eye"></span> Duration
                                        </button>
                                        <!-- modal started here -->
                                            <div class="modal fade" id="myModal_{{$activation->id}}">
                                                <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Manage Course Duration</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form action="{{url('admin/update/user/course/duration', ['user'=>$user->id])}}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="duration">Duration (Days)</label>
                                                                <input type="number" name="duration" class="form-control" id="duration" min="0" value="0">
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                    
                                                </div>
                                                </div>
                                            </div>
                                        <!-- modal end here -->
                                    </td>
                                </tr>
                                @empty
                                    <h4 class="">Data Not Found!</h4>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</div>
@endsection