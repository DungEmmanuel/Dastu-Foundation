<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\User;
use App\Comment;
use App\Image;

class BlogController extends Controller
{
    public function index() 
    {
        $posts = Post::all();
        //$images= Image::get();
        return view('blog.index', compact('posts'));
    }

    public function show($slug) 
    {
         $post = Post::whereSlug($slug)->firstOrFail();
         $comments = $post->comment()->get();
         $userid =$comments->get('user_id');
         $userr = User::where('id', '=', '2')->firstOrFail();
          //$user = User::with('comments')->get();
         $postid=$post->get(['id']);
         $images= Image::all();

         return view('blog.show', compact('post', 'comments', 'userr', 'userid', 'images'));
    }



}
