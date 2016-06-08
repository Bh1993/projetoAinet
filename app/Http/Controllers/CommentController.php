<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::paginate(10);

        return view('comments.list', compact('comment'));
    }

    public function getShow($id)
    {
        
        $comment = Comment::find($id);

        return view('comments.display-comment', compact('comment'));
           
    }

    public function postDelete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect('comments');

    }
}
