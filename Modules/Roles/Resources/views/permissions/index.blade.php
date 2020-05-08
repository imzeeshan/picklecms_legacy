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
                    <h4>List of all Permissions in the system. <a href="{{route('permissions.create')}}" class="btn btn-outline-primary">Add</a> </h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped" id="sortable-table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">@sortablelink('permissions','Permissions')</th>
                                <th scope="col">@sortablelink('entity','Entity')</th>
                                <th scope="col">@sortablelink('entity_type','Entity Type')</th>
                                <th scope="col">@sortablelink('role_id','Role')</th>

                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <th scope="row">{{ $permission->id }}</th>
                                    <td>{{ $permission->permissions }}</td>
                                    <td>{{ $permission->entity }}</td>
                                    <td>{{ $permission->entity_type }}</td>
                                    <td>{{ $permission->role->name }}</td>

                                    <td>
                                        <a href="{{route('permissions.edit',$permission->id)}}">Edit</a> &nbsp; | &nbsp;
                                        <a href="{{route('permissions.delete',$permission->id)}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>

                <div class="card-footer text-right">
                    {{ $permissions->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
