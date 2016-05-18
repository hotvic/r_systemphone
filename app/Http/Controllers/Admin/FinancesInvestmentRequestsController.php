<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FinancesInvestmentRequestsController extends Controller
{
    protected function get_receipt_path($user, $db_path)
    {
        return storage_path('app/receipts/' .  $db_path);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = \App\InvestmentRequest::where('status', '0')->paginate(15);

        return view('admin.finances.irequests.index')
            ->with('requests', $requests);
    }

    public function accept($id)
    {
        return view('admin.finances.irequests.accept')
            ->with('request', \App\InvestmentRequest::find($id));
    }

    public function reject($id)
    {
        return view('admin.finances.irequests.reject')
            ->with('request', \App\InvestmentRequest::find($id));
    }

    public function postStatus(Request $request, $id)
    {
        $this->validate($request, [
            'response' => 'present|string',
            'status' => 'required|integer'
        ]);

        $irequest = \App\InvestmentRequest::find($id);
        $irequest->response = $request->input('response');
        $irequest->status   = $request->input('status');

        if ($request->input('status') == 1)
        {
            $investment = $irequest->user->investments()->create([
                'description' => $irequest->description,
                'amount' => $irequest->amount,
                'type' => 'byrequest'
            ]);

            $irequest->investment_id = $investment->id;
        }

        $irequest->save();

        return response()->json(['success' => true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // TODO: Admin Creation ?
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: Admin Creation ?
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
        \App\InvestmentRequest::destroy($id);

        return redirect()->route('admin.irequests.index');
    }
}
