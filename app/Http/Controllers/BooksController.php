<?php

namespace App\Http\Controllers;
use App\Book;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscribe;
class BooksController extends Controller
{
    public function show() {
        $books = Book::all();

        foreach($books as $book) {
            $sub = Subscribe::where('book_id','=',$book->id)->latest('created_at')->take(1)->get();

            //if the book's subscriber = current user_id
            if ($sub[0]->user_id == 2) {
              $book->unsub = true;
            } else {
              $book->unsub = false;
            }
        }

        return view ('books/booksHome',['books'=>$books]);
    }

    public function create(){
        return view('createBook');
    }
    public function store(Request $request){
        if($request['subscription']==null)
            $request['subscription']='false';
        $book = Book::create($request->all());
        return redirect('users');
    }
    // public function subscribe($id){

    //     // $user_id = Auth::user()->id;
    //     $user_id = 1;
    //     $newSub = new Subscribe();
    //     $newSub->book_id = $id;
    //     $newSub->user_id = $user_id;
    //     $newSub->save();

    //     $updatedBook = Book::find($id);
    //     $updatedBook->subscription = true;
    //     $updatedBook->update();

    //     return redirect('/');
    // }

    public function unsubscribe($id){
        $user_id = 1;

    }
}
