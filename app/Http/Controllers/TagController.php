<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);

        return view('tags.list', compact('tags'));
    }

    public function postDashboardBlock(Tag $tag)
    {
        if ($tag->blocked == 0) {
            $tag->blocked = 1;
        } else {
            $tag->blocked = 0;
        }


        $tag->save();

        return redirect('tags');

    }

    public function getAllBlocked()
    {
        $tags = Tag::where('blocked', 1)->paginate(8);
        return view('tags.list',compact('tags'));
    } 
}
