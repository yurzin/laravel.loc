<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function show()
    {
        $title = 'About Page';
        return view('pages.about', compact('title'));
    }
}
