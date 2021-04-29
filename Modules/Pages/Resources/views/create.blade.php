@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pages : Add a new Page </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header"><h4>{{ __('Enter Page title and description ') }}</h4></div>

                        <div class="card-body">

                            <ul class="nav nav-tabs" id="pageTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Default </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="grapejs-tab" data-toggle="tab" href="#grapejs" role="tab" aria-controls="profile" aria-selected="false">GrapeJS</a>
                                </li>
                            </ul>

                            <div class="tab-content tab-bordered" id="tabContent">
                                <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <form role="form" method="POST" action="{{ route('pages.store') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Page Title</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" id='title' name="title" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea class="summernote" id='description' name="description"></textarea>
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
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>



                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button class="btn btn-primary">{{ __('Publish') }}</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                                <div class="tab-pane fade" id="grapejs" role="tabpanel" aria-labelledby="grapejs-tab">
                                    <form role="form" method="POST" action="{{ route('pages.store') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <label class="col-form-label text-md-left col-12">Page Title</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" id='title' name="title" class="form-control" required>
                                            </div>
                                        </div>

                                            <div class="panel__top">
                                                <div class="panel__basic-actions"></div>
                                            </div>
                                            <div class="editor-row">
                                                <div class="editor-canvas" style="height: 800px;">
                                                    <div id="gjs"></div>
                                                </div>
                                                <div class="panel__right">
                                                    <div class="layers-container"></div>
                                                </div>
                                            </div>
                                            <div id="blocks"></div>

                                        <div class="form-group">
                                            <label class="col-form-label text-md-left col-12">Status</label>
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

                                        <div class="form-group row">
                                            <label class="col-form-label text-md-left col-12">Author</label>
                                            <div class="form-group col-2">
                                                <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                    @foreach($users as $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label class="col-form-label text-md-left col-12"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button onclick="save_grapejs_data()" class="btn btn-primary">{{ __('Publish') }}</button>
                                            </div>
                                        </div>

                                        <input type="hidden" id="page_html" name="page_html" value=""/>
                                        <input type="hidden" id="page_css"  name="page_css" value=""/>
                                    </form>
                                </div>
                            </div>
                        </div>


                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('modules/summernote/summernote-bs4.js')}}"></script>
    <script src="{{ asset('modules/grapejs/grapes.min.js')}}"></script>
    <script src="{{ asset('modules/grapejs/grapesjs-preset-webpage.min.js')}}"></script>

    <script type="text/javascript">
        var pageHTML = "";
        var pageCSS  = "";
        var editor = grapesjs.init({
            height: '100%',
            showOffsets: 1,
            noticeOnUnload: 0,
            storageManager: { autoload: 0 },
            container: '#gjs',
            fromElement: true,

            plugins: ['gjs-preset-webpage'],
            pluginsOpts: {
                'gjs-preset-webpage': {}
            }
        });

        function save_grapejs_data()
        {
            pageHTML = editor.getHtml();
            pageCSS  = editor.getCss();
            $("#page_html").val(pageHTML);
            $("#page_css").val(pageCSS);


        }
    </script>
@endsection

@section('styles')

    <link rel="stylesheet" href="{{ asset('modules/grapejs/css/grapes.min.css')}}">
    <link rel="stylesheet" href="{{ asset('modules/grapejs/grapesjs-preset-webpage.min.css')}}">
    <link rel="stylesheet" href="{{ asset('modules/summernote/summernote-bs4.css')}}">
@endsection

