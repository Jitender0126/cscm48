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
                            <li><a href="#">Category Table</a></li>
                            
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            
                            <div class="card-header">
                                <strong class="card-title">Add New Category</strong>
                                <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#createCatModal">
                                
                                    <i class="fa fa-plus"></i>
                                </button>   
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $key=>$category)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td>{{$category->created_at}}</td>
                                            <td>{{$category->updated_at}}</td>
                                            <td>
                                        
                                                <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#viewModal-{{$category->id}}">
                                                    View
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#editModal-{{$category->id}}">
                                                    Edit
                                                    <i class="fa fa-wrench"></i>
                                                </button>
                            
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

            @foreach ($categories as $category)
             
                <div class="modal fade" id="createCatModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"  data-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Create Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form action="{{route('admin.category.store')}}" method="post" id="createCategory" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    
                                    <div class="modal-body">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category Name</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="Text" class="form-control"><small class="form-text text-muted"></small></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Sub Category</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="slug" placeholder="Text" class="form-control"><small class="form-text text-muted"></small></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                            <div class="col-12 col-md-9"><textarea name="description" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                        </div>
                                        
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Category Image</label></div>
                                            <div class="col-12 col-md-9"><input type="file" id="file-input" name="image" class="form-control-file"></div>
                                        </div>

                                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="alignment:center">Cancel <i class="fa fa-times"> </i></button>
                                        {{-- <button type="Submit" class="btn btn-primary" onclick="event.preventDefault(); 
                                        {{-- this.closest('form').submit();">Confrim <i class="fa fa-check"></i></button> --}}
                                        <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                                        document.getElementById('createCategory').submit();">Confrim <i class="fa fa-check"></i></button> 

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>   


                <div class="modal fade" id="viewModal-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" data-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">View</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Category Name</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">{{$category->name}}</p>
                                        </div>
                                    </div>
                                    
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Slug</label></div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static">{{$category->slug}}</p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Created at</label></div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static">{{$category->created_at}}</p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Updated at</label></div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static">{{$category->updated_at}}</p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Description</label></div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static">{{$category->description}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel </button>
                                {{-- <button type="button" class="btn btn-primary">Confirm <i class="fa fa-check"></button> --}}
                                    {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i class="fa fa-times"> </i></button> --}}
                                    {{-- <button type="button" class="btn btn-primary" >Confrim <i class="fa fa-check"></i></button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            
            
                <div class="modal fade" id="editModal-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"  data-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Edit category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                        <div>
                            <div class="modal-body">
                            <form action="{{route('admin.category.store',$category->id)}}" method="post" id="editCategory-{{$category->id}}" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category Name</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" value={{$category->name}} name="name" placeholder="Text" class="form-control"><small class="form-text text-muted"></small></div>
                                </div>
    
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Sub Category</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" value={{$category->slug}} name="slug" placeholder="Text" class="form-control"><small class="form-text text-muted"></small></div>
                                </div>
    
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                    <div class="col-12 col-md-9"><textarea name="description" id="textarea-input" rows="9"  placeholder="Content..." class="form-control">{{$category->description}}</textarea></div>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Category Image</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="image" class="form-control-file"></div>
                                </div>
                                
                                <div class  ="modal-footer">
                                
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i class="fa fa-times"> </i></button>
                                    {{-- <button type="Submit" class="btn btn-primary" onclick="event.preventDefault();  --}}
                                    {{-- {{-- this.closest('form').submit();">Confrim <i class="fa fa-check"></i></button>  --}}
                                    <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                                    document.getElementById('editCategory-{{$category->id}}').submit();">Confrim <i class="fa fa-check"></i></button> 

                                </div>
                            </form>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
                 <div class="modal fade" id="deleteModal-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static"> 
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
                                This Category will be deleted !
                                </p>
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-danger" class="fa fa-times" data-dismiss="modal">Cancel</button>  --}}
                                {{-- <button type="button" class="btn btn-primary" class="fa fa-check">Confirm </button>  --}}
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i class="fa fa-times"> </i></button> 
                                <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                document.getElementById('deleteCategory-{{$category->id}}').submit();">Confrim <i class="fa fa-check"></i></button>
                                <form action="{{route('admin.category.destroy',$category->id)}}" style="display:none" id="deleteCategory-{{$category->id}}" method="POST">
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