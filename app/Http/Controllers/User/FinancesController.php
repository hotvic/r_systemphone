<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FinancesController extends Controller
{
    public function index()
    {
        return view('user.finances.index');
    }
}
