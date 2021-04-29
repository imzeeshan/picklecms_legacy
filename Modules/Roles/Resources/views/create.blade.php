@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Roles : Add a new Role </h4>
                </div>
            </div>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <form role="form" method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="card-body">
                                    <div class="form-group col-6">
                                        <label>Role Name</label>
                                        <input id="name" type="text" class="form-control" value="" name="name" required="">
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
