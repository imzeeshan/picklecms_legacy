@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Roles : Edit </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('roles.update',$role->id) }}" enctype="multipart/form-data">

                            <input type="hidden" name="_method" value="PUT">

                            {{ csrf_field() }}

                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input id="name" type="text" class="form-control" value="{{ $role->name }}" name="name" autofocus>
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
    </div>

@endsection
