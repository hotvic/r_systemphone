<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FinancesInvestmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('user.finances.investments.index')
            ->with('investments', $investments = \Auth::user()->investments()->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function re(Request $request)
    {
        $description = sprintf('Investimento %s', \Auth::user()->investment_requests->count() + 1);
        $balance     = \Auth::user()->getBalance();

        return view('user.finances.investments.re')
            ->with('description', $description)
            ->with('balance', $balance);
    }

    public function postRe(Request $request)
    {
        $this->validate($request, [
            'amount'  => 'required|digits_between:3,15|balance',
        ]);

        \Auth::user()->withdrawals()->create([
            'to' => \App\User::admin()->email,
            'amount' => $request->input('amount') / 100,
            'description' => 'Re-Investimento'
        ]);

        \Auth::user()->investments()->create([
            'type' => 're',
            'amount' => $request->input('amount') / 100,
            'description' => 'Re-Investimento'
        ]);

        return redirect()->route('user.investments.index');
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
        \App\Investment::destroy($id);

        return redirect()->route('admin.investments.index');
    }
}
