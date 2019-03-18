<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    public function showBooks(){
        $books = DB::table('books')->get();
        return view ('books/booksHome',['books'=>$books]);
    }
}
