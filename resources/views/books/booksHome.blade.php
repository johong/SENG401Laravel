<!DOCTYPE html>
<html>
<Title>Home</Title>
<head>
   <title>Home</title>
   <link rel="stylesheet" type="text/css" href="{{asset('css/books.css')}}">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>

    <nav>
        <ul class = "main-nav">
            <li class = "nav-scroll" id = "personal-portfolio">Some Books</li>
            <div id = "links">
                <li><a href=""><strong>Login</strong></a></li>
            </div>
        </ul>
    </nav>
    <br><br><br>


    <div class = "book-container">
        <div id = "book-grid">

        <!-- For each here -->
        @if(count($books))
            @foreach($books as $book)

                <div style="cursor: pointer;" class = "book">
                    <div class = "images">
                        <img onclick="window.open('home/{{$book->ISBN}}','_self');" id="book-image" src="{{$book->image}}" alt="Book">
                    </div>
                    <p class="book-title">{{$book->name}}</p>
                    <p class='book-author'>By:
                        @foreach($book->authors as $author)
                            {{$author->name}} <br>
                        @endforeach
                    </p>
                    @if($book->subscription==false)
                    <form action="/{{$book->id}}" method = "post">
                        {{ csrf_field() }}
                        <button id = "sub" type="submit">Subscribe</button>
                    </form>

                    @else
                    <form action="">
                        {{ csrf_field() }}
                        <button id = "unsub" type="submit">Un-subscribe</button>
                    </form>

                    @endif


                </div>
            @endforeach
        @endif

        <!-- end for each -->
    
        </div>
    </div>

</body>
</html>