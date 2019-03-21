@extends('layouts.app')

@section('content')


@if(count($users))
<?php
    $users=$users->sortBy('name');
?>
<form action={{url('users')}} method="POST">
    {{ csrf_field() }}
<div id="userslist" style="overflow:scroll; height:200px;">
    <span>
        @foreach($users as $user)
            <article style='margin-top:2%; margin-bottom:2%;'>
            <p class="lead">
                {{$user->name}}, {{$user->email}}, {{$user->birthday}},  {{$user->educationfield}}:
            <select name="{{$user->id}}">
                    <option @if($user->role=='visitor') selected @endif value="visitor">visitor</option>
                    <option @if($user->role=='subscriber') selected @endif value="subscriber">subscriber</option>
                    <option @if($user->role=='admin') selected @endif value="admin">admin</option>
            </select>
            </p>
            </article>
        @endforeach
    </span>
</div>
    <input type=submit value="Confirm" class = 'btn btn-primary form-control' style='margin-top:1%; margin-bottom:1%'>
</form>
@endif

@if(count($books))
<?php
    $books=$books->sortBy('name');
?>
<form action={{url('subscribe')}} method="POST">
    {{ csrf_field() }}
    <div id="bookslist" style="overflow:scroll; height:200px;">
        <span>
            @foreach($books as $book)
                <article style='margin-top:2%; margin-bottom:2%;'>
                <p class="lead">
                        <a href = {{"/books/{$book->id}/edit"}} style='text-decoration:none;color:black;'>{{$book->iSBN}}: {{$book->name}}, {{$book->year}}, {{$book->publisher}}</a>
                    <select name="{{$book->id}}">
                        <option value = "none">-No One-</option>
                        @foreach($users as $user)
                            <option @if($book->subscribe->last()['user_id']==$user->id&&$book->subscription==true) selected @endif value={{$user->id}}>{{$user->name}}</option>
                        @endforeach 
                    </select>
                </p>
                </article>
            @endforeach
        </span>
    </div>
        <input type=submit value="Confirm Subscriptions" class = 'btn btn-primary form-control' style='margin-top:1%; margin-bottom:1%'>
</form>
@endif
<form action={{url('/books/create/')}}>
    <input type=submit value="Add Book" class = 'btn btn-primary form-control' style='margin-top:1%; margin-bottom:1%'>
</form>


@stop

