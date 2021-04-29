<?php

namespace Modules\Posts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Modules\Media\Entities\Media;
use Modules\Media\Http\Controllers\MediaController;
use Modules\Posts\Entities\Post;
use Modules\Posts\Entities\Comment;
use Modules\Posts\Entities\Category;
use Modules\User\Entities\User;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $posts = Post::sortable()->paginate(10);
        return view('posts::index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $users      = User::all();
        $categories = Category::all();
        return view('posts::create',compact('users','categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $post             = new Post();
        $media            = new Media();

        $post->title        = $request->title;
        $post->slug         = Str::slug($request->title);
        $post->category_id  = $request->category;
        $post->description  = $request->description;
        $post->tags         = json_encode($request->tags);
        $post->status       = $request->status?:0;
        $post->created_by   = Auth::user()->id;

        //save the media now
        $file_extension      = $request->file('file_upload')->getClientOriginalExtension();
        $media->title        = $request->title;
        $media->type         = $request->type?:0;
        $media->description  = $request->description;
        $media->name         = Str::slug($media->title);
        $media->created_by   = Auth::user()->id;
        $file                = $request->file('file_upload')->storeAs("public/media/images", "$media->name.$file_extension");
        $media->url          = env('APP_URL')."/media/images/$media->name.$file_extension";
        $media->save();

        $post->image = $media->url;
        $post->save();

        return Redirect::route('posts.index')->with('message', 'Post :- ' . $request->title .'  has been created successfully!');


    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $post       = Post::findOrFail($id);
        return view('posts::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $post       = Post::findOrFail($id);
        $categories = Category::all();
        $users      = User::all();

        return view('posts::edit', compact('post','categories','users'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $post               = Post::findOrFail($id);
        $post->title        = $request->title;
        $post->slug         = Str::slug($request->title);
        $post->category_id  = $request->category;
        $post->description  = $request->description;
        $post->tags         = json_encode($request->tags);
        $post->status       = $request->status?:0;
        $post->created_by   = Auth::user()->id;

        //save the media, only if file was uploaded.

        if($request->has('file_upload')) {
            // Delete existing image
            $media = Media::where('url',$post->image);
            $media->delete();

            // now upload the new media.
            $media          = new Media();
            $file_extension = $request->file('file_upload')->getClientOriginalExtension();
            $media->title = $request->title;
            $media->type = $request->type ?: 0;
            $media->description = $request->description;
            $media->name = Str::slug($media->title);
            $media->created_by = Auth::user()->id;
            $file = $request->file('file_upload')->storeAs("public/media/images", "$media->name.$file_extension");
            $media->url = env('APP_URL') . "/media/images/$media->name.$file_extension";
            $media->save();

            $post->image = $media->url;
        }

        $post->save();

        return Redirect::route('posts.index')->with('message', 'Post :- ' . $request->title .'  has been created successfully!');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $post       = Post::findOrFail($id);
        $post->delete();
        return Redirect::route('posts.index')->with('message', 'Post deleted!');
    }
}
