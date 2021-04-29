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
                    <h4>List of all Media files in the system. <a href="{{route('media.create')}}" class="btn btn-outline-primary">Add</a> </h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped" id="sortable-table">
                            <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">@sortablelink('name','Name')</th>
                                <th scope="col">@sortablelink('title','Title')</th>
                                <th scope="col">@sortablelink('type','Type')</th>
                                <th scope="col">@sortablelink('created_at','Created At')</th>
                                <th scope="col">Author</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all_media as $media)
                                <tr>
                                    <th scope="row">
                                        <a href="{{ $media->url }}" target="_blank">
                                            @if($media->type==0)
                                            <img src="{{ $media->url }}" class="media" width="50px;" height="50px;"/>
                                            @else
                                                <video width="50px;" class="media" height="50px;" controls>
                                                    <source src="{{ $media->url }}" type="video/mp4">
                                                    Your browser does not support HTML video.
                                                </video>
                                            @endif
                                        </a>
                                    </th>
                                    <td>{{ $media->name }}</td>
                                    <td>{{ $media->title }}</td>
                                    <td>@if($media->type==0)
                                        Image
                                        @else
                                        Video
                                        @endif
                                    </td>
                                    <td>{{ $media->created_at }}</td>
                                    <td>{{ $media->author->name }}</td>
                                    <td>
                                        <a href="{{route('media.edit',$media->id)}}">Edit</a> &nbsp; | &nbsp;
                                        <a href="{{route('media.delete',$media->id)}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>

                <div class="card-footer text-right">
                    {{ $all_media->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
