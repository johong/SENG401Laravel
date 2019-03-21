<?php

namespace App\Http\Controllers;

use App\Authors;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.createAuthor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = Authors::create($request->all());
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function show(Authors $authors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Authors::findOrFail($id);
        return view('authors.editAuthor',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request){
        $author = Authors::findOrFail($id);
        $author->update($request->all());
        return redirect ('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Authors::findOrFail($id)->delete();
        return redirect('users');
    }
}
