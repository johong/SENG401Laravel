@extends('layouts.app')

@section('content')


@if(count($users))
<?php
    $users=$users->sortBy('name');
?>
<br>
<h3>Users</h3>
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

<hr>

@if(count($books))
<?php
    $books=$books->sortBy('name');
?>
<br>
<h3>Books</h3>
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

<hr>
@if(count($authors))
<?php
    $authors=$authors->sortBy('name');
?>
<br>
<h3>Authors</h3>
<div id="authorlist" style="overflow:scroll; height:200px;">
        <span>
            @foreach($authors as $author)
                <article style='margin-top:2%; margin-bottom:2%;'>
                <p class="lead">
                        <a href = {{"/authors/{$author->id}/edit"}} style='text-decoration:none;color:black;'>{{$author->name}}</a>
                </p>
                </article>
            @endforeach
        </span>
    </div>
@endif
<form action={{url('/authors/create/')}}>
    <input type=submit value="Add Author" class = 'btn btn-primary form-control' style='margin-top:1%; margin-bottom:1%'>
</form>

@stop

