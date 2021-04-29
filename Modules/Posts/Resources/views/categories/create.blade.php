@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Blog Posts : Create Category. </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header"><h4>{{ __('Create a New Category ') }}</h4></div>

                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('categories.store') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Name</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" id='name' name="name" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button class="btn btn-primary">{{ __('Create') }}</button>
                                            </div>
                                        </div>

                                    </form>
                        </div>


                    </div>
                </div>



            </div>
        </div>
    </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

    <script src="{{ asset('modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script>
    $(".inputtags").tagsinput('items');
</script>
@endsection

@section('styles')

    <link rel="stylesheet" href="{{ asset('modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

@endsection

