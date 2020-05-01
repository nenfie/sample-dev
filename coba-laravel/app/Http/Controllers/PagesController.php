<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class PagesController extends Controller
{
    public function home()
    {
        return view('index');
    }

    public function about()
    {
        $nama = 'Nenfie Tjoeng';
        return view('about', ['nama' => $nama]);
    }
}