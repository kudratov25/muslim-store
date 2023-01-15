<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = Comment::create([
            'content'=>$request->content,
            'blog_id' => $request->blog_id,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {
        if (! Gate::allows('delete-comment', $comment)) {
            abort(403);
        }
        
        $comment->delete();
        return redirect()->back()->with('success', 'Comment Deleted');
    }
 
}
