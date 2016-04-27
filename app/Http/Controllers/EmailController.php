<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mailers\AppMailer;

class EmailController extends Controller
{
    public function signup(AppMailer $mailer, $id)
    {
        $user = \App\User::find($id);

        $mailer->sendConfirmation($user);

        return redirect('/');
    }
}
