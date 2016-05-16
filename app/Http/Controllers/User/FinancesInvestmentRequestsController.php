<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FinancesInvestmentRequestsController extends Controller
{
    protected function get_receipt_path($user, $db_path)
    {
        return storage_path('app/receipts/' .  $db_path);
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
        $requests = null;

        if ($request->has('s'))
            $requests = \App\InvestmentRequest::where('description', 'LIKE', psp($request->input('s')));

        $requests = $requests === null ? \App\InvestmentRequest::paginate(15) : $requests->paginate(15);

        return view('user.finances.irequests.index')
            ->with('requests', $requests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $description = sprintf('Investimento %s', \Auth::user()->investment_requests->count() + 1);
        $balance     = \Auth::user()->getBalance();

        return view('user.finances.irequests.create')
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
            'receipt' => 'image',
            'amount'  => 'required|digits_between:3,15'
        ]);

        \Storage::makeDirectory('receipts/' . \Auth::user()->username);

        $new_receipt = $request->file('receipt')->move($this->get_receipt_dir(), sprintf("%d.%s", time(), $request->file('receipt')->getClientOriginalExtension()));

        \Auth::user()->investment_requests()->create([
            'amount' => $request->input('amount') / 100,
            'receipt_path' => \Auth::user()->username . '/' . $new_receipt->getBasename(),
            'description' => $request->input('description')
        ]);

        return redirect()->route('user.irequests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $irequest = \App\InvestmentRequest::find($id);

        return response(file_get_contents($this->get_receipt_path($irequest->user, $irequest->receipt_path)))
            ->header('Content-Type', mime_content_type($this->get_receipt_path($irequest->user, $irequest->receipt_path)));
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
