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
                            <li><a href="#">Profile</a></li>
                            
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="row">
            <div class="col-md-4">
                
                <div class="card">
                   
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <img class="rounded-circle mx-auto d-block" src="{{asset('images/'.$user->image)}}" alt="{{asset('images/default.jpg')}}">
                            <h5 class="text-sm-center mt-2 mb-1">{{$user->name}}</h5>
                            
                        </div>
                        <hr>
                        
                    </div>
                </div>
            </div>    
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="Profile">
                           
                            
                                    <p>{{$user->description}}</p>
                             

                        </div>
                    </div>
                </div>
            </div> 
        </div>   
        
    </div>


@endsection