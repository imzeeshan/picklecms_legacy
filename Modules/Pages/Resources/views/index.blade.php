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
                    <h4>List of all Pages in the system. <a href="{{route('pages.create')}}" class="btn btn-outline-primary">Add</a> </h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped" id="sortable-table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">@sortablelink('title','Title')</th>
                                <th scope="col">@sortablelink('slug','Slug')</th>
                                <th scope="col">Status</th>
                                <th scope="col">Author</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <th scope="row">{{ $page->id }}</th>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->slug }}</td>
                                    <td>{{ $page->status?"Published":"UnPublished" }}</td>
                                    <td>{{ $page->author->name }}</td>
                                    <td>
                                        <a href="{{route('pages.edit',$page->id)}}">Edit</a> &nbsp; | &nbsp;
                                        <a href="{{route('pages.delete',$page->id)}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>

                <div class="card-footer text-right">
                    {{ $pages->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
