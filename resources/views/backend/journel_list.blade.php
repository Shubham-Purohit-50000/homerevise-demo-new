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
                            <li class="breadcrumb-item"><a href="#">All Journels</a></li>
                            <li class="breadcrumb-item active" aria-current="page">journel-list</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-7">
                <div class="text-end upgrade-btn">
                    <a href="{{url('admin/create/journel')}}" class="btn btn-danger text-white" target="_blank">Create Journel Post</a>
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
                                <h4 class="card-title">All Journel Post</h4>
                                <h5 class="card-subtitle">Overview of all post</h5>
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
                                    <th class="border-top-0">Description</th>
                                    <th class="border-top-0">Created At</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1</td>
                                    <td>Today I am grateful for...</td>
                                    <td>Lorem ipsum dolor sit amet consectetur. Molestie rutrum congue nunc nec. Eu tincidunt nisl nunc sapien pretium varius iaculis .</td>
                                    <td>20 Jan 2022</td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><span class="mdi mdi-pen"></span> Edit</button>
                                        <button class="btn btn-sm btn-danger text-white"><span class="mdi mdi-delete-empty"></span> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#2</td>
                                    <td>Positive Affirmations, I am...</td>
                                    <td>Lorem ipsum dolor sit amet consectetur. Molestie rutrum congue nunc nec. Eu tincidunt nisl nunc sapien pretium varius iaculis .</td>
                                    <td>20 Jan 2022</td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><span class="mdi mdi-pen"></span> Edit</button>
                                        <button class="btn btn-sm btn-danger text-white"><span class="mdi mdi-delete-empty"></span> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#3</td>
                                    <td>What would make this day grate?</td>
                                    <td>Lorem ipsum dolor sit amet consectetur. Molestie rutrum congue nunc nec. Eu tincidunt nisl nunc sapien pretium varius iaculis .</td>
                                    <td>20 Jan 2022</td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><span class="mdi mdi-pen"></span> Edit</button>
                                        <button class="btn btn-sm btn-danger text-white"><span class="mdi mdi-delete-empty"></span> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#4</td>
                                    <td>Wonderful things that happened today....</td>
                                    <td>Lorem ipsum dolor sit amet consectetur. Molestie rutrum congue nunc nec. Eu tincidunt nisl nunc sapien pretium varius iaculis .</td>
                                    <td>20 Jan 2022</td>
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