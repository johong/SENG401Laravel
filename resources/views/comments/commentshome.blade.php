@extends('layouts.app')

@section('content')
<div class="book-comments">
<h1>Book Stuff</h1>
    <div class = "images">
        <img id="book-image" src="{{$book[0]->image}}" alt="Book">
    </div>

    <p class="book-title">{{$book[0]->name}}</p>
    <p class='book-author'>By:
    @foreach ($book[0]->authors as $author) 
    {{$author->name}}
    @endforeach

    </p>


</div>


<div class="comments">
            <div class="Comment-content">
                <h1>Here's a list of all the comments for this book</h1>
                <table>
                    <thead>
                        <td>Time</td>
                        <td>Comment</td>
                        <td>User</td>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td class="inner-table">{{ $comment->created_at->format('d M Y - H:i:s')  }}</td>
                                <td class="inner-table">{{ $comment->text }}</td>
                                <td class="inner-table">{{ $comment->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
@if ($flag)
            <div class="comment-form">
                <form id="commentform" action="{{ route('comments.store') }}" method="POST">
                @csrf
                    <h1> Enter Comment</h1>
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