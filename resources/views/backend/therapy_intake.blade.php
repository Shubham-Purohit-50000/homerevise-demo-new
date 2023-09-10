@extends('backend.layout')
@section('title','Dashbord')
@section('content')

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
                            <li class="breadcrumb-item"><a href="#">Therapy Intake</a></li>
                            <li class="breadcrumb-item active" aria-current="page">therapy-Intake</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- <div class="col-7">
                <div class="text-end upgrade-btn">
                    <a href="{{url('admin/create/journel')}}" class="btn btn-danger text-white" target="_blank">Create Journel Post</a>
                </div>
            </div> -->
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex">
                            <div>
                                <h4 class="card-title">All Therapy Intake Survery List</h4>
                                <h5 class="card-subtitle">Overview of all therapy survey</h5>
                            </div>
                            <div class="ms-auto">
                                <div class="dl">
                                    <select class="form-select shadow-none">
                                        <option value="0" selected>Monthly</option>
                                        <option value="1">Daily</option>
                                        <option value="2">Weekly</option>
                                        <option value="3">Yearly</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="table-responsive">
                        <table class="table v-middle">
                            <thead>
                                <tr class="bg-light">
                                    <th class="border-top-0">User</th>
                                    <th class="border-top-0">Age</th>
                                    <th class="border-top-0">Gender</th>
                                    <th class="border-top-0">Address</th>
                                    <th class="border-top-0">Profession</th>
                                    <th class="border-top-0">Pre consultion</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Rohan Mehta</td>
                                    <td>27</td>
                                    <td>Male</td>
                                    <td>vikash Nagar, Jaipur 230014, (Rajasthan)</td>
                                    <td>Software Engineer at TCS</td>
                                    <td><label class="label label-success">YES</label></td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><span class="mdi mdi-download"></span> Report</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Vikash Mehra</td>
                                    <td>43</td>
                                    <td>Male</td>
                                    <td>Malvi Nagar, Jaipur 230014, (Rajasthan)</td>
                                    <td>Teacher</td>
                                    <td><label class="label label-danger">NO</label></td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><span class="mdi mdi-download"></span> Report</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sohani Sharma</td>
                                    <td>30</td>
                                    <td>Female</td>
                                    <td>Maruti Nagar, Surat 230014, (Gujrat)</td>
                                    <td>Software Engineer at Wipro</td>
                                    <td><label class="label label-success">YES</label></td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><span class="mdi mdi-download"></span> Report</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mohit Puniya</td>
                                    <td>36</td>
                                    <td>Male</td>
                                    <td>Balram Nagar, Sikar 332001, (Rajasthan)</td>
                                    <td>Software Engineer at TCS</td>
                                    <td><label class="label label-danger">NO</label></td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><span class="mdi mdi-download"></span> Report</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</div>

<!--chartis chart-->
<script src="{{asset('backend/assets/libs/chartist/dist/chartist.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{asset('backend/dist/js/pages/dashboards/dashboard1.js')}}"></script>
@endsection