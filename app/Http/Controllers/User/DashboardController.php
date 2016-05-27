<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Symfony\Component\HttpFoundation\ParameterBag;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.index')
            ->with('stats', (new \App\UserStatsManager(\Auth::user()))->getStatsBag())
            ->with('user', \Auth::user());
    }

    public function profile()
    {
        return view('user.profile')
            ->with('user', \Auth::user());
    }

    public function postProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'confirmed',
        ]);

        $user = \Auth::user();

        $user->name     = $request->input('name');

        if ($request->input('password') != '')
        {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('user::profile');
    }
}
