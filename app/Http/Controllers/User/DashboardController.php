<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.index');
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
        ]);

        $user = \Auth::user();

        $user->name = $request->input('name');
        $user->save();

        return redirect()->route('user::profile');
    }
}
