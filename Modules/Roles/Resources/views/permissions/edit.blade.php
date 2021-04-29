@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Permissions : Edit permission </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form role="form" method="POST" action="{{ route('permissions.update', $permission->id) }}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="card-body">
                                <div class="form-group col-6">
                                    <label class="d-block">Permissions</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="read_permission" name="read_permission"
                                               @if($permission->read_permission==1)
                                               checked="checked"
                                               @endif
                                        />
                                        <label class="form-check-label" for="read_permission">
                                            Read
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="write_permission" name="write_permission"
                                               @if($permission->write_permission==1)
                                               checked="checked"
                                               @endif
                                        />
                                        <label class="form-check-label" for="write_permission">
                                            Write
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="edit_permission" name="edit_permission"
                                               @if($permission->edit_permission==1)
                                               checked="checked"
                                               @endif
                                        />
                                        <label class="form-check-label" for="edit_permission">
                                            Edit
                                        </label>
                                    </div>
                                </div>


                                <div class="form-group col-6">
                                    <label>Entity</label>
                                    <input id="name" type="text" class="form-control" value="{{$permission->entity}}" name="entity" required="">
                                </div>

                                <div class="form-group col-6">
                                    <label for="entity_type">{{ __('Entity Type') }}</label>
                                    <select id="entity_type" name="entity_type" class="form-control" required="required">
                                        <option value="">Select an Entity Type</option>
                                        <option value="module"
                                                @if($permission->entity_type=='module')
                                                selected="selected"
                                                @endif
                                        >CMS Module </option>
                                        <option value="route"
                                                @if($permission->entity_type=='route')
                                                selected="selected"
                                                @endif
                                        >Route</option>
                                    </select>
                                </div>


                                <div class="form-group col-6">
                                    <label for="role_id">{{ __('Role') }}</label>
                                    <select id="role_id" name="role_id" class="form-control" required="required">
                                        <option value="">Select a Role</option>
                                        @foreach($roles as $role)
                                            @if($permission->role_id==$role->id)
                                                <option value="{{ $role->id }}" selected="selected">{{ $role->name }}</option>
                                            @else
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
