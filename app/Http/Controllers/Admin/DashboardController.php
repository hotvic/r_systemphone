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

    public function users(Request $request)
    {
        $users = \App\User::orderBy('id', 'asc')
            ->skip(15 * $request->input('page', 0))
            ->take(15);

        if ($request->has('s')) {
            $users->where('name', 'LIKE', '%' . $request->input('s') . '%')
                ->orWhere('email', 'LIKE', '%' . $request->input('s') . '%');
        }

        $users = $users->get();
            
        $data = array(
            'user' => \Auth::user(),
            'users' => $users->all(),
            'cur_page' => $request->input('page', 0) + 1,
            'num_pages' => $users->count(),
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
