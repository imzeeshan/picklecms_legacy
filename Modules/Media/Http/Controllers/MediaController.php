<?php

namespace Modules\Media\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Modules\Media\Entities\Media;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $all_media = Media::paginate(10);
        return view('media::index', compact('all_media'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('media::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $media               = new Media();
        $media->title        = $request->title;
        $media->alt_text     = $request->alt_text;
        $media->type         = $request->type?:0;
        $media->description  = $request->description;
        $media->name         = Str::slug($media->title);
        $media->created_by   = Auth::user()->id;
        $file_extension      = $request->file('file_upload')->getClientOriginalExtension();

        if($media->type==0) {
           $file = $request->file('file_upload')->storeAs("public/media/images", "$media->name.$file_extension");
           $media->url = env('APP_URL')."/media/images/$media->name.$file_extension";
       }
       else{
           $file = $request->file('file_upload')->storeAs("public/media/videos", "$media->name.$file_extension");
           $media->url = env('APP_URL')."/media/videos/$media->name.$file_extension";
       }


        $media->save();
        return Redirect::route('media.index')->with('message', 'Media uploaded successfully!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('media::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $media = Media::findOrFail($id);
        return view('media::edit', compact('media'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $media               = Media::findOrFail($id);
        $media->title        = $request->title;
        $media->alt_text     = $request->alt_text;
        $media->type         = $request->type;
        $media->description  = $request->description;
        $media->name         = Str::slug($media->title);
        $media->created_by   = Auth::user()->id;

        if($request->file('file_upload')) {
            $file_extension = $request->file('file_upload')->getClientOriginalExtension();

            if ($media->type == 0) {
                $file = $request->file('file_upload')->storeAs("public/media/images", "$media->name.$file_extension");
                $media->url = env('APP_URL') . "/media/images/$media->name.$file_extension";
            } else {
                $file = $request->file('file_upload')->storeAs("public/media/videos", "$media->name.$file_extension");
                $media->url = env('APP_URL') . "/media/videos/$media->name.$file_extension";
            }
        }


        $media->save();
        return Redirect::route('media.index')->with('message', 'Media updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        $media->delete();

        return Redirect::route('media.index')->with('message', 'Media deleted successfully');
    }
}
