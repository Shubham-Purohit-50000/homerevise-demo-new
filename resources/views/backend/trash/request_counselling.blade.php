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
                            <li class="breadcrumb-item"><a href="#">Counselling Request</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Counselling-requests</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- <div class="col-7">
                <div class="text-end upgrade-btn">
                    <a href="{{url('admin/create/plan')}}" class="btn btn-danger text-white" target="_blank">Create Plan</a>
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
                                <h4 class="card-title">All Counselling Request List</h4>
                                <h5 class="card-subtitle">Overview of all request</h5>
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
                                    <th class="border-top-0">Counselling Type</th>
                                    <th class="border-top-0">User Type</th>
                                    <th class="border-top-0">User Name</th>
                                    <th class="border-top-0">Counsellor</th>
                                    <th class="border-top-0">slot</th>
                                    <th class="border-top-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Relationship Issue</td>
                                    <td>Childern</td>
                                    <td>Rahul Sharma</td>
                                    <td>Dr. Mira Desai</td>
                                    <td>4:30 PM</td>
                                    <td>
                                        <label class="label label-success">Completed</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Depression</td>
                                    <td>LGBT</td>
                                    <td>Vivek Jain</td>
                                    <td>Dr. Mira Desai</td>
                                    <td>6:30 PM</td>
                                    <td>
                                        <label class="label label-warning">Pending</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Career</td>
                                    <td>Individual</td>
                                    <td>Rashmi Verma</td>
                                    <td>Dr. Manish Dhayl</td>
                                    <td>11:30 AM</td>
                                    <td>
                                        <label class="label label-danger">Canceled</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Career</td>
                                    <td>Growth</td>
                                    <td>Rashmi Verma</td>
                                    <td>Dr. Manish Dhayl</td>
                                    <td>11:30 AM</td>
                                    <td>
                                        <label class="label label-danger">Canceled</label>
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