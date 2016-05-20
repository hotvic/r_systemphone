<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $total_users       = \App\User::all()->count();
        $total_investments = \App\Investment::all()->count();
        $total_earnings    = \App\Earning::all()->count();
        $total_withdrawals = \App\Withdrawal::all()->count();

        return view('admin.index')
            ->with('total_users', $total_users)
            ->with('total_investments', $total_investments)
            ->with('total_earnings', $total_earnings)
            ->with('total_withdrawals', $total_withdrawals);
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

        // TODO: Validate!
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'confirmed'
        ]);

        $user->username    = $request->input('username');
        $user->email       = $request->input('email');
        $user->name        = $request->input('name');
        $user->referred_by = $request->input('referred_by');
        $user->active      = $request->has('active') ? true : false;
        $user->confirmed   = $request->has('confirmed') ? true : false;

        if ($request->input('password') != '')
        {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('admin::users');
    }

    public function total_26w($id)
    {
        $user = \App\User::find($id);

        $iTotal = $user->investments()->whereIn('type', ['byrequest', 'manual'])->sum('amount');
        $wTotal = $user->withdrawals()->sum('amount');

        // Total without any withdrawal (Compound)
        $nwTotal = $iTotal * pow((1 + 0.18), 26);

        // Apporx with withdrawal (Compound)
        $one = $iTotal * .18;
        $num = floor($wTotal / $one);
        $wwTotal = $iTotal * pow((1 + 0.18), 26 - $num);

        // Total not compound
        $byw = $iTotal * .18;
        $ncTotal = $iTotal + (26 * $byw);

        return view('admin.total_26w')
            ->with('nwTotal', $nwTotal)
            ->with('wwTotal', $wwTotal)
            ->with('ncTotal', $ncTotal);
    }
}
