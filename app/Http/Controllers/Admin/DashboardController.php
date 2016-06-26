<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index')
            ->with('stats', \App\StatsManager::getStatsBag());
    }

    public function users(Request $request)
    {
        $users = \App\User::orderBy('id', 'asc');

        if ($request->has('s')) {
            $users->where('username', 'LIKE', '%' . $request->input('s') . '%')
                ->orWhere('name', 'LIKE', '%' . $request->input('s') . '%')
                ->orWhere('email', 'LIKE', '%' . $request->input('s') . '%');
        }

        return view('admin.users')
            ->with('clients', $users->paginate(15));
    }

    public function updateUser($id)
    {
        return view('admin.updateuser')
            ->with('usr', \App\User::find($id));
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
            'password' => 'confirmed',
            'balance' => 'required|digits_between:3,15',
            'e_funds' => 'required|digits_between:3,15',
            'num_quotas' => 'required|integer',
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

        if ($request->has('critical-change'))
        {
            $user->balance    = $request->input('balance') / 100;
            $user->e_funds    = $request->input('e_funds') / 100;
            $user->num_quotas = $request->input('num_quotas');
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
