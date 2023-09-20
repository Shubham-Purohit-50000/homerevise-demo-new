@extends('backend.layout')
@section('title','Dashbord')
@section('content')
<script src="https://cdn.tiny.cloud/1/adnb18asr5ik4nc9qvkvngwb62t443tqa1kmqe9x08o0av2e/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
                <h4 class="page-title">Setting</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Setting</a></li>
                            <li class="breadcrumb-item active" aria-current="page">admin-setting</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-7">
                <div class="text-end upgrade-btn">
                    <a href="{{url('admin/dashboard')}}" class="btn btn-danger text-white">Dashboard</a>
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

    @foreach ($settings as $setting)

        @if($setting->setting_option == 'app_maintainance')
        @php
            $item = json_decode($setting->value);
        @endphp
        <div class="row">
            <!-- column -->
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex">
                            <div>
                                <h4 class="card-title">Update Maintainance Mode</h4>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="px-4 pb-4">
                        <form action="{{url('admin/setting/update/maintainance/mode')}}" method="post">
                            @csrf
                            <div class="form-group">
                            <label for="status">Status 
                                <span class="{{ $item->maintain_mode == 'true' ? 'text-success' : 'text-danger' }}">
                                    ({{$item->maintain_mode}})
                                </span>
                            </label>

                                <select name="maintain_mode" id="status" class="form-control">
                                    <option value="true">Active</option>
                                    <option value="false">Deactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <input type="text" name="message" class="form-control" value="{{$item->message}}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn btn-success text-white">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($setting->setting_option == 'app_version')
        @php
            $item = json_decode($setting->value);
        @endphp
        <div class="row">
            <!-- column -->
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex">
                            <div>
                                <h4 class="card-title">Update Application Version</h4>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="px-4 pb-4">
                        <form action="{{url('admin/setting/update/app/version')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="link">Download Link</label>
                                <input type="text" name="link" class="form-control" id="link" value="{{$item->link}}">
                            </div>
                            <div class="form-group">
                                <label for="version">Version</label>
                                <input type="text" name="version" class="form-control" id="version" value="{{$item->version}}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn btn-success text-white">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($setting->setting_option == 'pages')
        @php
            $item = json_decode($setting->value);
        @endphp
        <div class="row">
            <!-- column -->
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex">
                            <div>
                                <h4 class="card-title">Update Pages</h4>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="px-4 pb-4">
                        <form action="{{url('admin/setting/update/pages')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="privacy_policy">Privacy Policy</label>
                                <textarea name="privacy_policy" class="form-control" cols="30" rows="10">{{$item->privacy_policy}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="term_condition">Term & Condition</label>
                                <textarea name="term_condition" class="form-control" cols="30" rows="10">{{$item->term_condition}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="Support">Support</label>
                                <textarea name="Support" class="form-control" cols="30" rows="10">{{$item->Support}}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn btn-success text-white">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($setting->setting_option == 'announcements')
        @php
            $item = json_decode($setting->value);
        @endphp
        <div class="row">
            <!-- column -->
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex">
                            <div>
                                <h4 class="card-title">Update Announcements</h4>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="px-4 pb-4">
                        <form action="{{url('admin/setting/update/announcement')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="status">Status 
                                    <span class="{{ $item->status == 'true' ? 'text-success' : 'text-danger' }}">
                                        ({{$item->status}})
                                    </span>
                                </label>
                                <select name="status" id="status" class="form-control">
                                    <option value="true">Active</option>
                                    <option value="false">Deactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="heading">Heading</label>
                                <input type="text" name="heading" class="form-control" id="heading" value="{{$item->heading}}">
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" class="form-control" cols="30" rows="10">{{$item->body}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Announcement Image" style="width:70px">
                                    Image
                                </label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn btn-success text-white">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($setting->setting_option == 'base_url')
        @php
            $item = json_decode($setting->value);
        @endphp
        <div class="row">
            <!-- column -->
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex">
                            <div>
                                <h4 class="card-title">Update Base-url</h4>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="px-4 pb-4">
                        <form action="{{url('admin/setting/update/base_url')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="link">Url</label>
                                <input type="text" name="url" class="form-control" id="link" value="{{$item->url}}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn btn-success text-white">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
        
    @endforeach
        
    </div>
    
</div>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
    });
  </script>
@endsection