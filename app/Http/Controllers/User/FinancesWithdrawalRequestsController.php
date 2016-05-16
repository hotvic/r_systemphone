<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FinancesWithdrawalRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('user.finances.wrequests.index')
            ->with('requests', \App\WithdrawalRequest::paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $description = sprintf('Saque %s', \Auth::user()->withdrawals->count() + 1);
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
            'to' => 'required|email',
            'amount' => 'required|digits_between:3,15|balance'
        ]);

        \Auth::user()->withdrawal_requests()->create([
            'to' => $request->input('to'),
            'amount' => $request->input('amount') / 100,
            'description' => $request->input('description')
        ]);

        return redirect()->route('user.wrequests.index');
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
