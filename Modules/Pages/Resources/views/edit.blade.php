@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pages : Editing Page</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header"><h4>{{ __('Enter Page title and description ') }}</h4></div>

                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('pages.update',$page->id) }}">
                                <input type="hidden" name="_method" value="PUT">

                                {{ csrf_field() }}

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" id='title' name="title" class="form-control" value="{{$page->title}}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote" id='description' name="description">{{$page->description}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="status" value="1">
                                            <label class="form-check-label" for="gridRadios1">
                                                Published
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="status" value="0">
                                            <label class="form-check-label" for="gridRadios2">
                                                UnPublished
                                            </label>
                                        </div>
                                </div>
                                </div>

                                <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author</label>
                                    <div class="form-group col-2">
                                            <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">{{ __('Update') }}</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('modules/summernote/summernote-bs4.js')}}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('modules/summernote/summernote-bs4.css')}}">
@endsection

