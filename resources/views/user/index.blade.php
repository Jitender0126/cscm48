@extends('layouts.backendUser.app')

@section('content')
    <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Welcome {{Auth::user()->name}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard </li>
                </ol>
            </div>
        </div>
    </div>
</div>

{{-- @foreach ($Posts ?? '' as $post) --}}
    

        <div class="content mt-3">

         <div class="col-sm-8">
            <div class="card">
            <div class="card-header">
                <h4>Categories</h4>
            </div>
            <div class="card-body">
                <p class="text-muted m-b-15">Below are the list of Categories availabe for reading and discussion on this blog !</p>
                <p>Please click the specific category you want to see the posts on !</p>
                <ul class="list-unstyled">
                @foreach ($categories as $category)
                
                    <li><a href="#">{{$category->name}}</a></li>

                
                @endforeach
            </ul>
            </div>
        </div>
        </div>

    {{-- @endforeach --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Recent Posts</strong>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts  as $key=>$post)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->category->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    


</div> <!-- .content -->

@endsection