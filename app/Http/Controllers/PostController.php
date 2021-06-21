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
        $newPost->ownerId = $ownerId;
        $newPost->text = $text;
        $newPost->likes = 0;

        $newPost->save();
        return redirect()->intended(route('user.private'));
    }

    public static function index($ownerId)
    {
        //$allPostsOnPage =
        return DB::table('posts')->where('OwnerId',$ownerId)->orderBy('created_at')->select('Text')->get();
        // view('', compact('allPostsOnPage'));
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