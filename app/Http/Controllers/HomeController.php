<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function thankyou($id)
    {
        return view('thankyou')
            ->with('user', \App\User::find($id));
    }
}
