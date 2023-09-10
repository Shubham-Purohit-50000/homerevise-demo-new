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
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">user-list</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-7">
                <div class="text-end upgrade-btn">
                    <a href="{{url('admin/create/user')}}" class="btn btn-danger text-white" target="_blank">Create User</a>
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
                                <h4 class="card-title">User List</h4>
                                <h5 class="card-subtitle">Overview of all registered user</h5>
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
                                    <th class="border-top-0">S.N</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">email</th>
                                    <th class="border-top-0">Phone</th>
                                    <th class="border-top-0">State</th>
                                    <th class="border-top-0">Board</th>
                                    <th class="border-top-0">Medium</th>
                                    <th class="border-top-0">Activation Key</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1</td>
                                    <td>Mohit Sharma</td>
                                    <td>mohit@gmail.com</td>
                                    <td>9876543210</td>
                                    <td>Rajasthan</td>
                                    <td>RBSE</td>
                                    <td>English</td>
                                    <td>hjksff475uebcff</td>
                                </tr>
                                <tr>
                                    <td>#2</td>
                                    <td>Rahul Sharma</td>
                                    <td>rahul@gmail.com</td>
                                    <td>9876543210</td>
                                    <td>Rajasthan</td>
                                    <td>RBSE</td>
                                    <td>English</td>
                                    <td>hjksff475uebcff</td>
                                </tr>
                                <tr>
                                    <td>#3</td>
                                    <td>Vikarh Tailor</td>
                                    <td>vikash@gmail.com</td>
                                    <td>9876543210</td>
                                    <td>Rajasthan</td>
                                    <td>RBSE</td>
                                    <td>English</td>
                                    <td>hjksff475uebcff</td>
                                </tr>
                                <tr>
                                    <td>#4</td>
                                    <td>Shub Sharma</td>
                                    <td>shub@gmail.com</td>
                                    <td>9876543210</td>
                                    <td>Rajasthan</td>
                                    <td>RBSE</td>
                                    <td>English</td>
                                    <td>hjksff475uebcff</td>
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