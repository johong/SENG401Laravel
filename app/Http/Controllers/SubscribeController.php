<?php

namespace App\Http\Controllers;

use App\Subscribe;
use App\Book;
use Illuminate\Http\Request;

class SubscribeController extends Controller
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
        $updates=$request->all();
        $thekeys=array_keys($updates);
        $bookids;
        $userids;
        for($i = 1; $i<count($thekeys);$i++){
            $bookids[$i-1]=$thekeys[$i];
            $userids[$i-1]=$updates[$thekeys[$i]];
        }
        for($i = 0; $i<count($userids);$i++){
            if($userids[$i]=='none'){
                $changethis=Book::find($bookids[$i]);
                $changethis['subscription']=false;
                $changethis->save();
            }
            elseif(Book::find($bookids[$i])->subscribe->last()['user_id']==$userids[$i]){
                //nothing
            }
            else{
                $subscribe= new Subscribe;
                $subscribe['user_id'] = $userids[$i];
                $subscribe['book_id'] = $bookids[$i];
                $subscribe->save();
                Book::where('id',$bookids[$i])->update(['subscription'=>true]);
            }
        }
        return redirect()->back();
        // dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function show(Subscribe $subscribe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscribe $subscribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscribe $subscribe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscribe $subscribe)
    {
        //
    }
}
