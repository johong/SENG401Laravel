#!/bin/bash
php artisan tinker

//#function csvToArray($filename = '', $delimiter = ',')
$filename = public_path('file/SENG401-Lab4-Books.csv');

if (!file_exists($filename) || !is_readable($filename))
    echo "error";

$header = null;
$data = array();
if (($handle = fopen($filename, 'r')) !== false)
{
    while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
    {
        if (!$header)
            $header = $row;
        else
            $data[] = array_combine($header, $row);
    }
    fclose($handle);
}

$csvArr = $data;
foreach($csvArr as $record){
  $book = new App\Book;

  $authors = explode($record->authors,' , ');
  foreach($authors as $author){
    $newAuthor = new App\Author;
    $newAuthor->name = $author;
    $newAuthor->books()->associate($book);
    $book->authors()->associate($newAuthor);
    $newAuthor->save();
  }
  $book->name = $record->name;
  $book->ISBN = $record->ISBN;
  $book->publicationyear = $record->year;
  $book->publisher = $record->publisher;
  $book->image = $record->image;
  $book->save();
}
