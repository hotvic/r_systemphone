<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $data = array(
            'user' => \App\User::find(2), // TODO: \Auth::user()
            'users' => \App\User::all(),
        );

        return view('admin.users', $data);
    }

    public function updateUser($id)
    {
        $data = array(
            'usr' => \App\User::find($id),
        );

        // TODO: WRITE!!!

        return view('admin.updateuser', $data);
    }

    public function deleteUser($id)
    {
        \App\User::destroy($id);

        return redirect()->route('admin::users');
    }

    public function postUpdateUser(Request $request, $id)
    {
        $user = \App\User::find($id);

        $user->email = $request->input('email');
        $user->name  = $request->input('name');

        $user->save();

        return redirect()->route('admin::users');
    }
}
