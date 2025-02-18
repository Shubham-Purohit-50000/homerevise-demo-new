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
    #optioncontainer{
        padding: 10px;
        border: 2px dashed #cccccc70;
    }
    .content ul>li{
        font-size: 16px;
        line-height: 1.5;
        padding-top: 10px;
    }
</style>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Import Question</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Question</a></li>
                            <li class="breadcrumb-item active" aria-current="page">import-question</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-7">
                <div class="text-end upgrade-btn">
                    <a href="{{url('admin/questions')}}" class="btn btn-danger text-white">Question List</a>
                    <a href="{{url('/storage/uploads/QuestionSample.ods')}}" class="btn btn-danger text-white">Download Sample </a>

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
        
                    </div>
                    <div class="px-4 pb-4">
                        <h3 class="mb-3">Add Files</h3>
                        <form action="{{url('admin/questions/bulk-upload')}}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <div class="form-group" id="correct_answere">
                                <label for="correct_ans">Add Question File</label>
                                <input type="file" name="questionsFile" class="form-control" accept=".xls, .ods">
                                @error('questionsFile')
                                    <span class="text-danger">Please select question file.</span>
                                @enderror
                            </div> 
                            <div class="form-group" id="imageFile">
                                <label for="correct_ans">Add Image File</label>
                                <input type="file" name="imageFile" class="form-control" accept=".zip">
                                @error('questionsFile')
                                    <span class="text-danger">Please select question file.</span>
                                @enderror
                            </div> 
                            <div class="form-group">
                                <button type="submit" class="btn btn btn-success text-white">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6 card"> 
                <div class="">
                    <div class="py-4 px-4 pb-4">
                        <h2 class="mb-3">Important Notes:</h2>
                        <div class="content">
                            <ul>
                                <li>Please Download the Questions Sample File from the top right corner for better understanding.</li>
                                <li>For options kindly follow this rule: <br>
                                    {"A": " Option one", "B": " Option two", "C": " Option three", "D": " Option four",...............}
                                </li>
                                <li>for adding the image in questions kindly use this formate:- <br>
                                    &lt;img src=http://homerevise.co/storage/uploads/images/questions/images/imagename.extention>
                                </li>
                                <li>Kindly add all the related image in a folder with name of images and convert it into zip file and upload it.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>    
</div>
 
@endsection
