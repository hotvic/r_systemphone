<?php

namespace App\Mailers;

use Mail;

class AppMailer
{
    protected $from = 'contato@globalbetbrasil.com';

    public function sendConfirmation($to)
    {
        Mail::send('emails.signup', ['user' => $to], function ($m) use ($to) {
            $m->from($this->from, 'Global Bet Brasil');

            $m->to($to->email, $to->name)->subject('Confirmação de E-Mail');
        });
    }
}