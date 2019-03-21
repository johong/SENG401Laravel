@extends('layouts.app')

@section('content')
<div class="book-comments">
<h1 class='comment-book-title'>{{$book[0]->name}}</h1>

<div class='comment-year-author'>
    <p class='comment-book-author'>By:
    @foreach ($book[0]->authors as $author) 
    {{$author->name}}
    @endforeach
    <p class="comment-book-year">{{$book[0]->year}}</p>
    </p>
    </div>
    <div class = "comment-images">
        <img id="comment-book-image" src="{{$book[0]->image}}" alt="Book">
    </div>



</div>


                       

            <div class="Comment-content">
                <h1>Here's a list of all the comments for this book</h1>
                @if(count($comments))
                @foreach ($comments as $comment)
                <p class="user-comment"> <span class="inner-name"> {{ $comment->name }}  </span><br> 
                                      <span class="inner-comment">{{ $comment->text }} </span><br>
                                      <span class="inner-date">{{ $comment->created_at->format('d M Y - H:i:s')  }}</span> <br>          
                </p>
                @endforeach
                @else
                <p class="user-comment">
                <span class="inner-comment"> No comments for this book :( </span><br>
                </p>
                @endif
            </div>
            
@if($flag == true)
            <div class="comment-form">
                <form id="commentform" action="{{ route('comments.store') }}" method="POST">
                @csrf
                    <h1 class="form-header"> Enter Comment</h1>
                    <div class="form-input">
                        <label>Comment</label> <input type="text" name="Comment">
                        <input type="hidden" name="book_id" value={{$book[0]->id}}>
                    </div>
                    <button type="submit" value="Confirm">Submit</button>
                </form>
            </div>



        </div>
        @endif 

    <br>
    <br>

@endsection