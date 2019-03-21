<?php

namespace App\Http\Controllers;

use \Auth;
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
        $query = \App\Comment::join('users', 'comments.user_id', '=', 'users.id')
        ->select('comments.*','users.*')
        ->get();


        $flag = 1;
        $check = Auth::User();
        if(isset($check)){        
        $userdata = \App\Subscribe::where('book_id', '=', $comment->book_id)
                                    ->where('user_id', '=', Auth::User()->id)
                                    ->get();

            if($userdata != null){
                $flag = 1;
            }
        }


        return view ('comments/commentshome',['comments'=>$query, 'flag'=>$flag]);


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
        $request->validate([
            'Comment'=>'required'
          ]);
          $comment = new comment([
            'text' => $request->get('Comment'),
            'book_id' => $request->get('book_id'),
            'user_id'=> Auth::User()->id
          ]);
          $comment->save();
          $param = $request->get('book_id');
          return redirect()->route('comments.show', [$param]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($book_id)
    {
        
        $query = \App\Comment::where('book_id', '=', $book_id)
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->select('users.name', 'comments.*')
                ->get();
        $book = \App\Book::where('id', '=', $book_id)->get();
                // ->join('authors_book','books.id', '=', 'book_id')
                // ->join('authors', 'authors.id', '=', 'authors_id')
                // ->select('authors.name','books.*')
                // ->get();

        $check = Auth::User();
        $flag = false;
        if(isset($check)){        
        $userdata = \App\Subscribe::where('book_id', '=', $book_id)
                                    ->where('user_id', '=', Auth::User()->id)
                                    ->get();

            if(count($userdata) > 0){
                $flag = true;
            }
        }
        return view ('comments/commentshome',['comments'=>$query, 'flag' => $flag, 'book'=>$book]);

    }
}
