@extends('layouts.app')
@section('content')
<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Blogs</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        @if ($message = Session::get('success'))
                        <div class="alert border-0 alert-dismissible fade show py-2">
                            <div class="alert alert-success">
                                    <div class="ms-3">
                                        <h6 class="mb-0 text-dark">Success Alerts</h6>
                                        <div class="text-dark">{{ $message }}</div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <?php $i=1 ?>
                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <div class="pb-3">
                                            <a href="{{ route('admin.blog.create') }}">
                                                <button type="button" class="data-toggle-action-tooltip btn btn-outline-primary btn-circle btn-sm confirm-action-primary">Add Blog</button>
                                            </a>
                                        </div>
                                            <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Title</th>
                                                <th>Sub Title</th>
                                                <th>Image</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            
                                            @foreach ($blogs as $data)
                                                <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $data->title}}</td>
                                                <td>{{ $data->sub_title}}</td>
                                                <td><div><img src="{{ asset('public/uploaded/image/'.$data->image) }}" height='50' width="50" />  </div></td>
                                                <td>{!! Str::limit($data->description, 25, $end='.......') !!}</td>
                                                <td>
                                                    <a class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm confirm-action-success"data-bs-toggle="modal" data-bs-target="#viewModal"onclick="view( {{ $data }} )" href="{{ route('admin.blog.show',$data->id) }}"><i class="fa fa-eye"></i></a>
                                                    <a class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm confirm-action-success" href="{{ route('admin.blog.edit',$data->id) }}">Edit</a>
                                                    <button type="button"onclick="sweet_form({{$data->id}})" class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-danger" >Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div><!-- container -->
                </div><!-- page-->
            </div><!-- main content -->
     <!-- view modal -->
     <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Blog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" id="InputId"name="InputId" value=""/>
                                <div class="row">
                                    <img id="ViewImage"src="" height='100' width="100" >
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div>
                                        <label id="ViewTitle" style="text-align: center;"></label>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <div>
                                            <label id="ViewDescription"></label>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
            </div>
        </div>
    </div>
            
@endsection
@section('script')
<script>
        function view(val){
            $('#ViewTime').html(val.created_at);
            $('#ViewTitle').html(val.title);
            $('#ViewSubtitle').html(val.sub_title);
            $('#ViewDescription').html(val.description);
            $('#ViewImage').attr('src',"{{ asset('public/uploaded/image') }}/"+val.image);
        };
        function sweet_form(id){
            var red = "{{ url('admin/removeBlog') }}/"+id ;
            swal.fire({
                title: 'Are you sure to delete?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#28a745',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			cancelButtonText: 'No, cancel!',
			confirmButtonClass: 'btn btn-success',
			cancelButtonClass: 'btn btn-danger'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(location).attr('href', red);
                }
            })			
	    }
</script>

@endsection
