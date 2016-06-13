<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WithdrawalRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = \Auth::user()->withdrawal_requests()->where('status', 0)->paginate(15);

        return view('user.finances.wrequests.index')
            ->with('requests', $requests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $description = sprintf('Saque %s; + Taxa 10%%', \Auth::user()->withdrawals->count() + 1);
        $balance = \Auth::user()->earnings()->sum('amount') - \Auth::user()->withdrawals()->sum('amount');

        return view('user.finances.wrequests.create')
            ->with('user', \Auth::user())
            ->with('description', $description)
            ->with('balance', $balance);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'account' => 'required|integer|in:0,1',
            'accountInfo' => 'required_if:account,1',
            'amount' => 'required|digits_between:3,15|balance10|withdrawal_value|withdrawal_limit'
        ]);

        $accountInfo = $request->input('accountInfo');
        $amount      = $request->input('amount') / 100;

        if ($request->input('account') == 0)
        {
            $user = \Auth::user();

            $accountInfo = sprintf("Titular: %s\n", $user->holder);
            $accountInfo .= sprintf("Banco: %s\n", $user->bank);
            $accountInfo .= sprintf("Agência: %s\n", $user->agency);
            $accountInfo .= sprintf("Conta: %s\n", $user->account);
            $accountInfo .= sprintf("Tipo: %s\n", $user->account_type == 0 ? 'Corrente' : 'Poupança');
        }

        $accountInfo .= sprintf("\n\nValor Requerido: %s", format_money($amount));

        \Auth::user()->withdrawal_requests()->create([
            'account' => $request->input('account'),
            'account_info' => $accountInfo,
            'amount' => $amount + ($amount * 0.10),
            'description' => $request->input('description')
        ]);

        $request->session()->flash('success', true);

        return redirect()->route('user.finance.wrequests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
