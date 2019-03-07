<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturesController extends Controller
{
    public function showLectures() {
      $titles = ["SA", "QA", "Archtecture Patterns", "UML", "REST", "SOAP"];
      $cars = ["Volvo", "Cadillac", "Benz"];

      // return view('lectures', ["titles"=>$titles]);
      return view('lectures')->with('titles', $titles)->with('cars', $cars);
    }

    public function showWelcome() {
      return view('welcome');
    }
}
