@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
            <div class="card-header">
                <h4>Users : Edit</h4>
            </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data">

                                    <input type="hidden" name="_method" value="PUT">

                                    {{ csrf_field() }}
                                    <div class="card-body">


                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input id="name" type="text" class="form-control" value="{{ $user->name }}" name="name" autofocus>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="email">{{ __('E-Mail Address') }}</label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" name="email">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="role_id">{{ __('Role') }}</label>
                                            <select id="role_id" name="role_id" class="form-control" required="required">
                                                <option value="">Select a Role</option>
                                                @foreach($roles as $role)
                                                    @if($user->role_id==$role->id)
                                                        <option value="{{ $role->id }}" selected="selected">{{ $role->name }}</option>
                                                    @else
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">{{ __('Password') }}</label>
                                            <input id="password" type="password"class="form-control" name="password">
                                        </div>
                                    </div>
                                    </div>

                                    <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Update') }}
                                            </button>
                                    </div>

                                </form>
            </div>
        </div>
    </div>
</div>

@endsection
