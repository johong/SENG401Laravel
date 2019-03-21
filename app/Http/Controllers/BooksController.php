<?php

namespace App\Http\Controllers;
use App\Book;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscribe;
class BooksController extends Controller
{
    public function show() {
        $books = Book::all()->sortBy('id');

        $loggedIn = false;
        $check = \Auth::user();
        if(isset($check)){
            $user_id = $check->id;
            $loggedIn = true;
            foreach($books as $book) {
                $sub = Subscribe::where('book_id','=',$book->id)->latest('created_at')->take(1)->get();
    
                //if the book's subscriber = current user_id
                if (count($sub) > 0) {
                    if ($sub[0]->user_id == $user_id) {
                        $book->unsub = true;
                        continue;
                    }
                }

                $book->unsub = false;
                
            }
        }

        return view ('books/booksHome',['books'=>$books, 'loggedIn'=>$loggedIn]);
    }

    public function create(){
        return view('books.createBook');
    }
    public function store(Request $request){
        if($request['subscription']==null)
            $request['subscription']='false';
        $book = Book::create($request->all());
        return redirect('users');
    }
    public function subscribe($id){

        $check = \Auth::user();
        if(!isset($check))
            return redirect('/');

        
        $user_id = $check->id;
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
        $check = \Auth::user();
        if(!isset($check))
            return redirect('/');

        $user_id = $check->id;

        $updatedBook = Book::find($id);
        $updatedBook->subscription = false;
        $updatedBook->update();

        return redirect('/');
    }

    public function edit($id){
        $book = Book::findOrFail($id);
        return view('books.editBook',compact('book'));
    }

    public function update($id, Request $request){
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect ('users');
    }
    public function destroy($id){
        Book::findOrFail($id)->delete();
        return redirect('users');
    }
}
