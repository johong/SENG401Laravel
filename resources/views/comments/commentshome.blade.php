@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
            <div class="content">
                <h1>Here's a list of all the comments for this book</h1>
                <table>
                    <thead>
                        <td>Book ISBN</td>
                        <td>Comment</td>
                        <td>User</td>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->ISBN }}</td>
                                <td class="inner-table">{{ $comment->text }}</td>
                                <td class="inner-table">{{ $comment->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>



            <div class="content">
                <form id="commentform" method="POST" action="{{ config('app.url')}}/comments">
                    <h1> Enter Comment</h1>
                    <div class="form-input">
                        <label>Book</label> <input type="text" name="BookName">
                    </div>
                    <div class="form-input">
                        <label>Comment</label> <input type="text" name="Comment">
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>



        </div>


@endsection