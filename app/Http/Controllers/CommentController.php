<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index()
    {
        //
        $query = \App\Comment::
        join('users', 'comments.user_id', '=', 'users.id')
        ->select('comments.*','users.email')
        ->get();
        return view ('comments/commentshome',['comments'=>$query]);


    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        
        $query = \App\Comment::where('book_id', '=', $comment->book_id)
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->select('comments.*','users.email')
                ->get();
        $userdata = \App\Subscribe::where('book_id', '=', $comment->book_id)
                                    ->where('user_id', '=', Auth::user()->id)
                                    ->get();
        $flag = 0;
        // if($userdata != null){
        //     $flag = 1;
        // }
        
        return view ('comments/commentshome',['comments'=>$query, 'flag'=> $userdata]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
