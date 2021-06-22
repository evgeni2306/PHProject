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
        //return redirect()->intended(route('user.private'));
        return redirect()->back();
    }

    public static function index($ownerId)
    {
        
        return DB::table('posts')->where('OwnerId',$ownerId)->orderBy('created_at', 'desc')->join('users', 'posts.CreatorId', '=', 'users.id')->select('posts.*', 'users.name')->whereNull('deleted_at')->paginate(1);
        
    }

    public function edit(Request $request)
    {
        $post = new Post();
        $id = $request->input('postId');
        $post = Post::find($id);

        $post->text = $request->input('text');
        $post->save();
        return redirect()->back();
        //return redirect()->intended(route('user.private'));
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        Post::find($id)->delete();
        //return redirect()->intended(route('user.private'));
        return redirect()->back();
    }

    public function indexReturnInJson($ownerId)
    {
        return DB::table('posts')->where('OwnerId',$ownerId)->orderBy('created_at', 'desc')->join('users', 'posts.CreatorId', '=', 'users.id')->select('posts.*', 'users.name')->whereNull('deleted_at')->paginate(1);
    }
}