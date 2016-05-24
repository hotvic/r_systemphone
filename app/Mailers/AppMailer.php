<?php

namespace App\Mailers;

use Mail;

class AppMailer
{
    protected $from = 'contato@systemphonne.com';

    public function sendConfirmation($to)
    {
        Mail::send('emails.signup', ['user' => $to], function ($m) use ($to) {
            $m->from($this->from, 'SystemPhone');

            $m->to($to->email, $to->name)->subject('Confirmação de E-Mail');
        });
    }
}