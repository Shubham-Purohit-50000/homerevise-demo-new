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
                <h4 class="page-title">Privacy Policy</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Privacy Policy</a></li>
                            <li class="breadcrumb-item active" aria-current="page">privacy-policy</li>
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
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex">
                            <div>
                                <h4 class="card-title">All Plan List</h4>
                                <h5 class="card-subtitle">Overview of all plan</h5>
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
                                    <th class="border-top-0">#ID</th>
                                    <th class="border-top-0">Title</th>
                                    <th class="border-top-0">Price</th>
                                    <th class="border-top-0">Video Access</th>
                                    <th class="border-top-0">Chat Access</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1</td>
                                    <td>Platinum</td>
                                    <td>₹ 3999</td>
                                    <td>7 Week</td>
                                    <td>9 Week</td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><span class="mdi mdi-pen"></span> Edit</button>
                                        <button class="btn btn-sm btn-danger text-white"><span class="mdi mdi-delete-empty"></span> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#1</td>
                                    <td>Gold</td>
                                    <td>₹ 2999</td>
                                    <td>5 Week</td>
                                    <td>7 Week</td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><span class="mdi mdi-pen"></span> Edit</button>
                                        <button class="btn btn-sm btn-danger text-white"><span class="mdi mdi-delete-empty"></span> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#1</td>
                                    <td>Silver</td>
                                    <td>₹ 1999</td>
                                    <td>3 Week</td>
                                    <td>4 Week</td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><span class="mdi mdi-pen"></span> Edit</button>
                                        <button class="btn btn-sm btn-danger text-white"><span class="mdi mdi-delete-empty"></span> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#1</td>
                                    <td>Bronz</td>
                                    <td>₹ 999</td>
                                    <td>2 Week</td>
                                    <td>3 Week</td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><span class="mdi mdi-pen"></span> Edit</button>
                                        <button class="btn btn-sm btn-danger text-white"><span class="mdi mdi-delete-empty"></span> Delete</button>
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