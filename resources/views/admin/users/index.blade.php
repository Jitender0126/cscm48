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
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">User Table</a></li>
                            
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
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>User ID</th>
                                            <th>Email</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key=>$user)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->role->name}}</td>
                                            <td>{{$user->user_id}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>{{$user->updated_at}}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#viewModal-{{$user->id}}">
                                                    View
                                                    <i class="fa fa-eye"></i>
                                                </button>
                            
                                                <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#editModal-{{$user->id}}">
                                                    Edit
                                                    <i class="fa fa-wrench"></i>
                                                </button>
                            
                                                <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#deleteModal-{{$user->id}}">
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

         @foreach ($users as $user)
             
         
            <div class="modal fade" id="viewModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" data-backdrop="static" aria-hidden="true">
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
                                <div class="col col-md-3"><label class=" form-control-label"> Name</label></div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$user->name}}</p>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">User ID</label></div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$user->user_id}}</p>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Role</label></div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$user->role->name}}</p>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$user->email}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Created at</label></div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$user->created_at}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Updated at</label></div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$user->updated_at}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i class="fa fa-times"></button> --}}
                            {{-- <button type="button" class="btn btn-primary">Confirm <i class="fa fa-check"></button> --}}
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i class="fa fa-times"> </i></button>
                                <button type="button" class="btn btn-primary" >Confrim <i class="fa fa-check"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"  data-backdrop="static" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <div>
                            <form action="{{route('admin.user.update',$user->id)}}" method="post" id="editUser-{{$user->id}}" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PUT')
                            <div class="modal-body">
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">User Name</label></div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$user->name}}</p>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">User ID</label></div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$user->user_id}}</p>
                                </div>
                            </div>

                            
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Role</label></div>
                                    <div class="col col-md-9">
                                        <div class="form-check">

                                            @foreach ($roles as $role)
                                                
                                            <div class="radio">
                                                <label for="radio1" class="form-check-label ">
                                                    <input type="radio" id="radio1" name="role" value="{{$role->id}}" 
                                                    class="form-check-input" {{$user->role->id==$role->id ? 'checked':''}}>{{$role->name}}
                                                </label>
                                            </div>

                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i class="fa fa-times"> </i></button>
                                {{-- <button type="Submit" class="btn btn-primary" onclick="event.preventDefault(); --}}
                                {{-- this.closest('form').submit();">Confrim <i class="fa fa-check"></i></button> --}}
                                <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                                 document.getElementById('editUser-{{$user->id}}').submit();">Confrim <i class="fa fa-check"></i></button> 

                            </div>
                            </form>
                        </div>

                        
                        
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deleteModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                               This user will be deleted
                            </p>
                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-danger" class="fa fa-times" data-dismiss="modal">Cancel</button> --}}
                            {{-- <button type="button" class="btn btn-primary" class="fa fa-check">Confirm </button> --}}
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i class="fa fa-times"> </i></button>
                            <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                            document.getElementById('deleteUser-{{$user->id}}').submit();">Confrim <i class="fa fa-check"></i></button>
                            <form action="{{route('admin.user.destroy',$user->id)}}" style="display:none" id="deleteUser-{{$user->id}}" method="POST">
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