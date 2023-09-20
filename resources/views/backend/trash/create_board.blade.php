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
                            <li class="breadcrumb-item"><a href="#">Plan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">create-plan</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-7">
                <div class="text-end upgrade-btn">
                    <a href="{{url('admin/plans')}}" class="btn btn-danger text-white" target="_blank">Plan List</a>
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
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex">
                            <div>
                                <h4 class="card-title">Create Plan</h4>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="px-4 pb-4">
                        <h3 class="mb-3">Plan Form</h3>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Plan Title</label>
                                <input type="text" name="" class="form-control" id="" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" name="" class="form-control" id="" placeholder="Enter Price">
                            </div>
                            <div class="form-group">
                                <label for="">Vide Access (week)</label>
                                <input type="number" name="" class="form-control" id="" placeholder="Enter Week  Number">
                            </div>
                            <div class="form-group">
                                <label for="">Chat Access (week)</label>
                                <input type="number" name="" class="form-control" id="" placeholder="Enter Week Number">
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Active</option>
                                    <option value="">Deactive</option>
                                    <option value="">Pending</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn btn-success text-white">Submit</button>
                            </div>
                        </form>
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