<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FinancesEarningsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $earnings = null;

        if ($request->has('s'))
            $earnings = \Auth::user()->earnings()->where('description', 'LIKE', psp($request->input('s')));

        $earnings = $earnings === null ? \Auth::user()->earnings()->paginate(15) : $earnings->paginate(15);

        return view('user.finances.earnings.index')
            ->with('earnings', $earnings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $description = sprintf('Investimento %s', \Auth::user()->investment_requests->count() + 1);

        return view('user.finances.irequests.create')
            ->with('user', \Auth::user())
            ->with('description', $description);
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
            'receipt' => 'required|image',
            'amount' => 'required|digits_between:3,15'
        ]);

        \Storage::makeDirectory('receipts/' . \Auth::user()->username);

        $new_receipt = $request->file('receipt')->move($this->get_receipt_dir(), sprintf("%d.%s", time(), $request->file('receipt')->getClientOriginalExtension()));

        \Auth::user()->investment_requests()->create([
            'amount' => $request->input('amount') / 100,
            'receipt_path' => \Auth::user()->username . '/' . $new_receipt->getBasename(),
            'description' => $request->input('description')
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
        //
    }
}
