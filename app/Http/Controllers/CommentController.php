<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::paginate(10);

        return view('comments.list', compact('comments'));
    }
/*
    public function getShow($id)
    {
        
        $comment = Comment::find($id);

        return view('comments.display-comment', compact('comment'));
           
    }
*/
    public function postDelete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect('comments');

    }

    public function postCreate($id, Request $request)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);
        $comment = new Comment();

        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->advertisement_id = $id;
        $comment->save();
        
        return back();
    }

    public function postReply($advertisement_id, Request $request)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->get('parent_id');
        $comment->advertisement_id = $advertisement_id;
        
        $comment->save();
        
        return back();
    }
}
