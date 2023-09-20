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
                            <li class="breadcrumb-item"><a href="#">Quiz</a></li>
                            <li class="breadcrumb-item active" aria-current="page">quiz-list</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-7">
                <div class="text-end upgrade-btn">
                    <a href="{{url('admin/create/quiz')}}" class="btn btn-danger text-white" target="_blank">Create Quiz</a>
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
                                <h4 class="card-title">All Quiz List</h4>
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
                                    <th class="border-top-0">Question</th>
                                    <th class="border-top-0">Answer</th>
                                    <th class="border-top-0">Quiz Type</th>
                                    <th class="border-top-0">Quiz ID</th>
                                    <th class="border-top-0">Grade</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1</td>
                                    <td>Which city are you from?</td>
                                    <td>-----</td>
                                    <td>Subjective</td>
                                    <td>3</td>
                                    <td>2 points</td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><span class="mdi mdi-pen"></span> Edit</button>
                                        <button class="btn btn-sm btn-danger text-white"><span class="mdi mdi-delete-empty"></span> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#2</td>
                                    <td>How do you identify yourself in terms of gender?</td>
                                    <td>
                                        <label class="label label-success">male</label>
                                        <label class="label label-success">female</label>
                                        <label class="label label-success">trans</label>
                                    </td>
                                    <td>Multiple</td>
                                    <td>3</td>
                                    <td>2 points</td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><span class="mdi mdi-pen"></span> Edit</button>
                                        <button class="btn btn-sm btn-danger text-white"><span class="mdi mdi-delete-empty"></span> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#2</td>
                                    <td>What are you seeking help for?</td>
                                    <td>
                                        <label class="label label-success">Health</label>
                                        <label class="label label-success">Relationship</label>
                                        <label class="label label-success">Physiotherapy</label>
                                        <label class="label label-success">Personal</label>
                                    </td>
                                    <td>Multiple</td>
                                    <td>3</td>
                                    <td>2 points</td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><span class="mdi mdi-pen"></span> Edit</button>
                                        <button class="btn btn-sm btn-danger text-white"><span class="mdi mdi-delete-empty"></span> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#1</td>
                                    <td>Have you consulted a psychologist or a psychiatrist before?</td>
                                    <td>
                                        <label class="label label-success">Yes</label>
                                        <label class="label label-success">No</label>
                                    </td>
                                    <td>Yes/No</td>
                                    <td>3</td>
                                    <td>1 points</td>
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