<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    

public function index()
{
    $title = 'PHP EEEEE';
    $subtitle = 'Wellllllllll';
    return view('index',['title'=>$title,'subtitle'=>$subtitle]);
}

public function newsall()
{
    $title = 'PHP EEEEE';
    $subtitle = 'Wellllllllll';
    return view('news_all',['title'=>$title,'subtitle'=>$subtitle]);
}
}