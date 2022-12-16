 
@extends('layouts.app')
@section('content')
            <div class="main-content">

                <div class="page-content">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.blog.index') }}">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New</li>
                    </ol>
                    </nav>
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">New Blog</h4>

                                    <div class="page-title-right">
                                    <input type="button" class="data-toggle-action-tooltip btn btn-outline-primary btn-circle btn-sm confirm-action-primary" value="Back" onclick="history.back()">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="alert border-0 alert-dismissible fade show py-2">
                                <div class="alert alert-danger">
                                        <div class="ms-3">
                                            <h6 class="mb-0 text-dark">Danger Alerts</h6>
                                            <div class="text-dark">{{ $message }}</div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                        <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                    <form action="{{ route('admin.blog.store') }}" method="POST"class="custom-validation" enctype="multipart/form-data" name="blog-add" id="blog-add">
                                            @csrf
                                            <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label>Title</label>
                                                    <div>
                                                    <input type="text"  id="InputTitle" name="InputTitle" class="@error('InputTitle') is-invalid @enderror form-control"  value="{{ old('InputSubtitle') }}" />
                                                    @error('InputTitle')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label>Sub Title</label>
                                                    <div>
                                                        <input type="text"id="InputSubtitle" name="InputSubtitle" class="@error('InputSubtitle') is-invalid @enderror form-control"  value="{{ old('InputSubtitle') }}" required/>
                                                        @error('InputSubtitle')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label>Image</label>
                                                    <div>
                                                        <input class="@error('InputImage') is-invalid @enderror form-control" type="file" name="InputImage" id="InputImage" required />
                                                        @error('InputImage')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label>Description</label>
                                                <div>
                                                    <textarea  id="elm1" name="InputDescription" value="{{ old('InputDescription') }}"> </textarea>   
                                                </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="mb-0">
                                                <div>
                                                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div><!-- container-->
                </div><!-- page -->
            </div><!-- main-->
@endsection
@section('script')
<script>
  $( document ).ready(function() {
        $("#blog-add").validate({
 
            rules: {
                InputTitle: {
                    required: true,
                    minlength: 3
                },
 
                InputSubtitle: {
                    required: true,
                },
                InputImage: {
                    required:true,
                }
            },
            messages: {
 
                InputTitle: {
                    required: "Please enter title",
                    minlength:"Please enter atleast 3 character"
                },
                InputSubtitle: {
                    required: "Please enter sub title",
                },
                InputImage: {
                    required: "Please enter image",
                }
                 description: {
                    required: "Please enter description",
                },
            },
        })
    });
 </script>
 @endsection