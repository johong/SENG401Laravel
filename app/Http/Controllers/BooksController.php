<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
class BooksController extends Controller
{
    public function showBooks(){
        // $books = DB::table('books')->join('authors_book','authors_book.authors_id', '=', 'book.id')->
        //                             join('authors','authors.id', '=', 'authors_book.authors_id')->get();
        $books = Book::all();
        return view ('books/booksHome',['books'=>$books]);
    }
}
