<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Subscribe;
class BooksController extends Controller
{
    public function showBooks(){
        $books = Book::all();
        return view ('books/booksHome',['books'=>$books]);
    }
}
