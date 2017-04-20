<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CommentFormRequest; 
use App\Comment;
use Illuminate\Support\Facades\Auth;



class CommentsController extends Controller
{
    
  public function newComment(CommentFormRequest $request) 
  {
         $comment = new Comment(array(
         'post_id' => $request->get('post_id'), 
         'content' => $request->get('content'),
         'user_id' => Auth::user()->id,
          ));
          $comment->save();
          return redirect()->back()->with('status', 'Your comment has been submitted!'); 
  }
}
