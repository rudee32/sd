<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the comments.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $comments = Comment::with('content')->get();
        return view('admin.comments.index', compact('comments'));
    }
}
