<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FinancesInvestmentRequestsController extends Controller
{
    protected function get_receipt_path($path)
    {
        return storage_path('app/receipts/' . $path);
    }

    protected function get_receipt_dir()
    {
        return storage_path('app/receipts/' . \Auth::user()->username);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$investments = \App\Investment::orderBy('id', 'ASC')->take(15);

        if ($request->has('page'))
            $investments->skip(15 * $request->input('page'));

        if ($request->has('s'))
            $investments->where('description', 'LIKE', psp($request->input('s')));

        $investments = $investments->get();

        return view('user.finances.investments.index')
            ->with('investments', $investments->all())
            ->with('investments_count', \App\Investment::get()->count())
            ->with('cur_page', $request->input('page', 0) + 1);*/
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
