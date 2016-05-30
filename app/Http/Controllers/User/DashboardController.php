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
            'birthday' => 'required',
            'phone_number' => 'present',
            'bank' => 'required|in:001,237,104,341,033',
            'agency' => 'present',
            'account' => 'present',
            'account_type' => 'present',
            'holder' => 'present',
            'password' => 'confirmed',
        ]);

        $user = \Auth::user();

        $user->name         = $request->input('name');
        $user->birthday     = $request->input('birthday');
        $user->phone_number = $request->input('phone_number');
        $user->bank         = $request->input('bank');
        $user->agency       = $request->input('agency');
        $user->account      = $request->input('account');
        $user->account_type = $request->input('account_type');
        $user->holder       = $request->input('holder');

        if ($request->input('password') != '')
        {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('user::profile');
    }

    public function references()
    {
        $references = \App\User::where('referred_by', \Auth::user()->username)->paginate(15);

        return view('user.references')
            ->with('references', $references);
    }
}
