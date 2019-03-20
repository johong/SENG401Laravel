<?php

namespace App\Http\Controllers;
use App\Book;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    public function showBooks(){
        $books = DB::table('books')->get();
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
}
