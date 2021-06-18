<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller{
     
    //
    public function create(Request $request)
    {
        $creatorId = $request->input('creatorId');
        $ownerId = $request->input('ownerId');
        $text = $request->input('text');

        $newPost = new Post;
        $newPost->creatorId = $creatorId;

        $newPost->save();
        return redirect()->route('');
    }

    public function index($ownerId)
    {
        $allPostsOnPage = DB::table('posts')->where('OwnerId',$ownerId)->orderBy('created_at');
        return view('', compact('allPostsOnPage'));
    }

    public function edit(Request $request)
    {
        $post = new Post();
        $id = $request->input('postId');
        $post = Post::find($id);

        $post->text = $request->input('text');
        $post->save();
        return redirect()-route('');
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        return redirect()->route('');
    }
}