@extends('layouts.backend.app')
@push('header')
<link rel="stylesheet" href="{{asset('backend/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
@endpush
@section('content')
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">



        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Categories</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Posts</a></li>
                            
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-12">

                        @if ($errors->any())
                        
                                @foreach ($errors->all() as $error)
                                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                    <span class="badge badge-pill badge-danger">Error</span> {{$error}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                @endforeach
                            
                         @endif

                        
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            
                            <div class="card-header">
                                <strong class="card-title">Post</strong>
                                <a href="{{route('admin.post.create')}}" class="btn  btn-primary"><i class="fa fa-plus"></i></a>  
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $key=>$post)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$post->name}}</td>
                                            <td>{{$post->slug}}</td>
                                            <td>{{$post->created_at}}</td>
                                            <td>{{$post->updated_at}}</td>
                                            <td>
                                        
                                                <a href="{{route('admin.post.show',$post->id)}}" class="btn btn-info"><i class="fa fa-eye"></a>
                                                <a href="{{route('admin.post.show',$post->id)}}" class="btn btn-success"><i class="fa fa-wrench"></a>
                                                <a href="{{route('admin.post.show',$post->id)}}" class="btn btn-info"><i class="fa fa-eye"></a>
                                                                            
                                                <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#deleteModal-{{$category->id}}">
                                                    Delete
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <div class="animated">

            @foreach ($posts as $post)
            
                 <div class="modal fade" id="deleteModal-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static"> 
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Delete Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                This Post will be deleted !
                                </p>
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-danger" class="fa fa-times" data-dismiss="modal">Cancel</button>  --}}
                                {{-- <button type="button" class="btn btn-primary" class="fa fa-check">Confirm </button>  --}}
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i class="fa fa-times"> </i></button> 
                                <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                document.getElementById('deletePost-{{$post->id}}').submit();">Confrim <i class="fa fa-check"></i></button>
                                <form action="{{route('admin.post.destroy',$post->id)}}" style="display:none" id="deletePost-{{$post->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                </form>

                            </div>
                        </div>
                    </div> 
                </div> 
            
            @endforeach  
        </div>
    </div>



@endsection