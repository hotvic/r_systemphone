<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WithdrawalRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = \App\WithdrawalRequest::where('status', '0')->paginate(15);

        return view('admin.finances.wrequests.index')
            ->with('requests', $requests);
    }

    public function accept($id)
    {
        return view('admin.finances.wrequests.accept')
            ->with('request', \App\WithdrawalRequest::find($id));
    }

    public function reject($id)
    {
        return view('admin.finances.wrequests.reject')
            ->with('request', \App\WithdrawalRequest::find($id));
    }

    public function postStatus(Request $request, $id)
    {
        $this->validate($request, [
            'response' => 'present|string',
            'status' => 'required|integer'
        ]);

        $wrequest = \App\WithdrawalRequest::find($id);
        $wrequest->response = $request->input('response');
        $wrequest->status   = $request->input('status');

        if ($request->input('status') == 1)
        {
            $withdrawal = $wrequest->user->withdrawals()->create([
                'description' => 'Requisição de Saque',
                'account_info' => $wrequest->account_info,
                'amount' => $wrequest->amount
            ]);

            $wrequest->withdrawal_id = $withdrawal->id;
        }

        $wrequest->save();

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\WithdrawalRequest::destroy($id);

        return redirect()->route('admin.finance.wrequests.index');
    }
}
