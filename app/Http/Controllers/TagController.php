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
}
