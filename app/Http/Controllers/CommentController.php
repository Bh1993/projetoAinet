<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function postCreate(Request $request)
    {
        
        $this->validate($request, [
            'comment' => 'required',
            'user_id' => 'required',
            'advertisement_id' => 'required',
            'parent_id' => '',
        ]);

        $comment = new Comment($request->all());

        $comment->save();
        
        return redirect('/');
    }
}
