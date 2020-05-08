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
                    <h4>List of all Blog Categories in the system. <a href="{{route('categories.create')}}" class="btn btn-outline-primary">Add</a> </h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped" id="sortable-table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">@sortablelink('name','Name')</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{route('categories.edit',$category->id)}}">Edit</a> &nbsp; | &nbsp;
                                        <a href="{{route('categories.delete',$category->id)}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>

                <div class="card-footer text-right">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
