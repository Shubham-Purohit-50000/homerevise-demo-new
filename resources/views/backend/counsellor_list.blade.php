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
                            <li class="breadcrumb-item"><a href="#">Counsellor</a></li>
                            <li class="breadcrumb-item active" aria-current="page">counsellor-list</li>
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
                                <h4 class="card-title">All Counsellors List</h4>
                                <h5 class="card-subtitle">Overview of all counsellor</h5>
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
                                    <th class="border-top-0">ID</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Profession</th>
                                    <th class="border-top-0">Rate Per Min</th>
                                    <th class="border-top-0">Experience</th>
                                    <th class="border-top-0">Description</th>
                                    <th class="border-top-0">Available Slot</th>
                                    <th class="border-top-0">Active Status</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1</td>
                                    <td>Dr. Mira Desai</td>
                                    <td>Dentist</td>
                                    <td>Min 30 min / Max 45 min</td>
                                    <td>6+ Years Exp</td>
                                    <td>BDS, Post Graduate Diploma In Aesthetic & Restorative Dentistry</td>
                                    <td>
                                        <label class="label label-primary">09:00 am</label>
                                        <label class="label label-primary">12:00 pm</label>
                                        <label class="label label-primary">04:00 pm</label>
                                        <label class="label label-primary">06:00 pm</label>
                                    </td>
                                    <td>
                                        <label class="label label-success">Live</label>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info">More</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#2</td>
                                    <td>Dr. BD Kerla</td>
                                    <td>Dentist</td>
                                    <td>Min 30 min / Max 45 min</td>
                                    <td>3+ Years Exp</td>
                                    <td>BDS, Post Graduate Diploma In Aesthetic & Restorative Dentistry</td>
                                    <td>
                                        <label class="label label-primary">09:00 am</label>
                                        <label class="label label-primary">12:00 pm</label>
                                        <label class="label label-primary">04:00 pm</label>
                                        <label class="label label-primary">06:00 pm</label>
                                    </td>
                                    <td>
                                        <label class="label label-danger">Inactive</label>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info">More</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#1</td>
                                    <td>Dr. Mira Desai</td>
                                    <td>Dentist</td>
                                    <td>Min 30 min / Max 45 min</td>
                                    <td>6+ Years Exp</td>
                                    <td>BDS, Post Graduate Diploma In Aesthetic & Restorative Dentistry</td>
                                    <td>
                                        <label class="label label-primary">09:00 am</label>
                                        <label class="label label-primary">12:00 pm</label>
                                        <label class="label label-primary">04:00 pm</label>
                                        <label class="label label-primary">06:00 pm</label>
                                    </td>
                                    <td>
                                        <label class="label label-success">Live</label>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info">More</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#1</td>
                                    <td>Dr. Urmial Jain</td>
                                    <td>Dentist</td>
                                    <td>Min 30 min / Max 45 min</td>
                                    <td>11+ Years Exp</td>
                                    <td>BDS, Post Graduate Diploma In Aesthetic & Restorative Dentistry</td>
                                    <td>
                                        <label class="label label-primary">09:00 am</label>
                                        <label class="label label-primary">12:00 pm</label>
                                        <label class="label label-primary">04:00 pm</label>
                                        <label class="label label-primary">06:00 pm</label>
                                    </td>
                                    <td>
                                        <label class="label label-success">Live</label>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info">More</button>
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