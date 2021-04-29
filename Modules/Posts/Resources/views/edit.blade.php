@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Blog Posts : Update Your Post. </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header"><h4>{{ __('Update Post ') }}</h4></div>

                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">

                                        {{ csrf_field() }}

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Post Title</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" id='title' name="title" class="form-control" value="{{$post->title}}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select class="form-control selectric" id="category" name="category">
                                                    @foreach($categories as $category)
                                                        @if($category->id  ==  $post->category_id)
                                                            <option id="{{$category->id}}" value="{{$category->id}}" selected="selected">{{ $category->name }}</option>
                                                        @else
                                                            <option id="{{$category->id}}" value="{{$category->id}}">{{ $category->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea class="summernote" id='description' name="description">{{$post->description}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control inputtags" id="tags" name="tags" value="{{ json_decode($post->tags)}}">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Featured Image</label>
                                            <div class="col-sm-12 col-md-7">
                                                <div id="image-preview" class="image-preview">
                                                    <label for="image-upload" id="image-label">Choose File</label>
                                                    <img class="card-img-overlay" id="image-preview" src="{{$post->image}}" alt="{{$post->title}}" />
                                                    <input type="file" name="file_upload" id="file_upload" />
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="status" value="1" checked="checked">
                                                    <label class="form-check-label" for="published">
                                                        Published
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="status" value="0">
                                                    <label class="form-check-label" for="not_published">
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
                                                        @if($user->id == $post->author->id)
                                                            <option value="{{$user->id}}" selected="selected">{{$user->name}}</option>
                                                        @else
                                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                                        @endif
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
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script>
    $("selectric").selectric();
    $.uploadPreview({
        input_field: "#file_upload",   // Default: .image-upload
        preview_box: "#image-preview",  // Default: .image-preview
        label_field: "#image-label",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null         // Default: null
    });
    $(".inputtags").tagsinput('tags');

</script>
@endsection

@section('styles')

    <link rel="stylesheet" href="{{ asset('modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/summernote/summernote-bs4.css') }}">
@endsection

