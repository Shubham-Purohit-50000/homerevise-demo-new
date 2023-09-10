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
                            <li class="breadcrumb-item"><a href="#">Transactions</a></li>
                            <li class="breadcrumb-item active" aria-current="page">transaction-list</li>
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
                                <h4 class="card-title">All Transaction List</h4>
                                <h5 class="card-subtitle">Overview of all transactions</h5>
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
                                    <th class="border-top-0">TNX ID</th>
                                    <th class="border-top-0 text-center" style="width: 120px">Method</th>
                                    <th class="border-top-0">User</th>
                                    <th class="border-top-0">Plan</th>
                                    <th class="border-top-0">Amount</th>
                                    <th class="border-top-0">TNX Status</th>
                                    <th class="border-top-0">Created AT</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>PAY_QR98745632</td>
                                    <td class="text-center"><img src="{{asset('images/logo/paytm.png')}}" alt="" style="width:100px"></td>
                                    <td>Rohan</td>
                                    <td>Gold</td>
                                    <td>₹ 4999</td>
                                    <td><label class="label label-warning">Pending</label></td>
                                    <td>
                                        03 Jan 2023
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><span class="mdi mdi-download"></span> Invoice</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>PAY_QR98745632</td>
                                    <td class="text-center"><img src="{{asset('images/logo/paytm.png')}}" alt="" style="width:100px"></td>
                                    <td>Rohan</td>
                                    <td>Gold</td>
                                    <td>₹ 4999</td>
                                    <td><label class="label label-danger">Failed</label></td>
                                    <td>
                                        12 March 2023
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><span class="mdi mdi-download"></span> Invoice</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>PAY_QR98745632</td>
                                    <td class="text-center"><img src="{{asset('images/logo/paytm.png')}}" alt="" style="width:100px"></td>
                                    <td>Rohan</td>
                                    <td>Silver</td>
                                    <td>₹ 1999</td>
                                    <td><label class="label label-success">Success</label></td>
                                    <td>
                                        03 Jan 2023
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><span class="mdi mdi-download"></span> Invoice</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>PAY_QR98745632</td>
                                    <td class="text-center"><img src="{{asset('images/logo/paytm.png')}}" alt="" style="width:100px"></td>
                                    <td>Rohan</td>
                                    <td>Platinum</td>
                                    <td>₹ 2999</td>
                                    <td><label class="label label-success">Success</label></td>
                                    <td>
                                        11 Dec 2022
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><span class="mdi mdi-download"></span> Invoice</button>
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