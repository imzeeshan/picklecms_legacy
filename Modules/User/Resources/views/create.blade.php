@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Users : Add a new User </h4>
                </div>
            </div>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <form role="form" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input id="name" type="text" class="form-control" value="" name="name" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id="email" type="email" class="form-control" name="email" value="" name="email" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="role_id">{{ __('Role') }}</label>
                                        <select id="role_id" name="role_id" class="form-control" required="required">
                                            <option value="">Select a Role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input id="password" type="password" class="form-control" name="password">
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
