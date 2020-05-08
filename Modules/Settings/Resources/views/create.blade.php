@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Settings : Add a new Setting </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header"><h4>{{ __('Enter Setting name and value ') }}</h4></div>

                        <div class="card-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('settings.store') }}">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="key">{{ __('Setting Name') }}</label>
                                        <input id="key" type="text" class="form-control" value="" name="key" autofocus>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="key">{{ __('Setting Value') }}</label>
                                        <input id="value" type="value" class="form-control" value="" name="value" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-6">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        {{ __('Add') }}
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

@endsection
