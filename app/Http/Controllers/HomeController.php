<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function thankyou($username)
    {
        return view('thankyou')
            ->with('user', \App\User::where('username', $username)->first());
    }
}
