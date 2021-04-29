@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            @if (session('message'))

                <div class="alert alert-secondary alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{ session('message') }}
                    </div>
                </div>

            @endif

            <div class="card">
                <div class="card-header">
                    <h4>List of all Posts in the system. <a href="{{route('posts.create')}}" class="btn btn-outline-primary">Add</a> </h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped" id="sortable-table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">@sortablelink('title','Title')</th>
                                <th scope="col">@sortablelink('category','Category')</th>
                                <th scope="col">@sortablelink('tags','Tags')</th>
                                <th scope="col">Status</th>
                                <th scope="col">Author</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th scope="row">{{ $post->id }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ json_decode($post->tags) }}</td>
                                    <td>{{ $post->status?"Published":"UnPublished" }}</td>
                                    <td>{{ $post->author->name }}</td>
                                    <td>
                                        <a href="{{route('posts.edit',$post->id)}}">Edit</a> &nbsp; | &nbsp;
                                        <a href="{{route('posts.delete',$post->id)}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>

                <div class="card-footer text-right">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
