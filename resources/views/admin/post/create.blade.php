@extends('layouts.backend.app')
@push('header')
<link rel="stylesheet" href="{{asset('backend/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
@endpush
@section('content')
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">


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
                                <strong class="card-title">Create Post</strong>
                                {{-- <a href="{{route('admin.post.create')}}" class="btn  btn-primary"><i class="fa fa-plus"></i></a>   --}}
                            </div>
                            <div class="card-body">
                                <div class="col-20 col-md-20" >
                                    <form action="{{route('admin.post.store')}}" method='post' enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                        <div class="row form-group">
                                            <div class="col col-md-9"><label for="title" class=" form-control-label">Text Input</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="title" name="title" placeholder="Post Title" class="form-control">
                                                
        
                                            </div>
                                        </div>
        
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label">Select Category</label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="select" id="select" class="form-control">
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
        
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="title" class=" form-control-label">Tags</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="title" name="tags" placeholder="Tag(separated by comma)" class="form-control">
                                                
        
                                            </div>
                                        </div>
                                        
                                        <div class="row form-group" >
                                            <div class="col">
                                            <label for="textarea-input" class=" form-control-label">Body</label>
                                            <textarea name="body" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                            </div>
                                        </div>
        
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i class="fa fa-times"> </i></button> 
                                        <button type="button" class="btn btn-primary" >Confrim <i class="fa fa-check"></i></button>
                                    

                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
   
    </div>



@endsection