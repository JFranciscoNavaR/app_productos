<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function __invoke()
    {
        return view('auth.login');
    }
}
