<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Subscribe;
class BooksController extends Controller
{
    public function show() {
        $books = Book::all();
<<<<<<< HEAD

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
=======
        foreach($books as $book){
            $sub = Subscribe::where('book_id','=',$book->id)->latest('created_at')->take(1)->get();;
            array_push($subs, $sub);
        }
        // $subs = Subscribe::all();
        
        return view ('books/booksHome',['subs'=>$subs, 'books'=>$books]);
>>>>>>> ff7532ae7c6cd61e775508ee8685702e83a39012

    }

    public function subscribe($id){

        // $user_id = Auth::user()->id;
        $user_id = 1;
        $newSub = new Subscribe();
        $newSub->book_id = $id;
        $newSub->user_id = $user_id;
        $newSub->save();

        $updatedBook = Book::find($id);
        $updatedBook->subscription = true;
        $updatedBook->update();

        return redirect('/');
    }

    public function unsubscribe($id){
        $user_id = 1;

    }
}
