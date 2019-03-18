<!DOCTYPE html>
<html>
<Title></Title>
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
                <div onclick="window.open('home/{{$book->ISBN}}','_self');" style="cursor: pointer;" class = "book">
                    <div class = "images">
                        <img id="book-image" src="{{$book->Image}}" alt="Book">
                    </div>
                    <p class="book-title">{{$book->Name}}</p>
                    <p class='book-author'>{{$book->Authors}}</p>
                    <button>Subscribe</button>
                </div>
            @endforeach
        @endif

        <!-- end for each -->
    
        </div>
    </div>

</body>
</html>