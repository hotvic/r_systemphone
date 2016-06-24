<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuotaRequestsController extends Controller
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
        $requests = \App\QuotaRequest::where('status', '0')->paginate(15);

        return view('admin.finances.qrequests.index')
            ->with('requests', $requests);
    }

    public function accept($id)
    {
        return view('admin.finances.qrequests.accept')
            ->with('request', \App\QuotaRequest::find($id));
    }

    public function reject($id)
    {
        return view('admin.finances.qrequests.reject')
            ->with('request', \App\QuotaRequest::find($id));
    }

    public function postStatus(Request $request, $id)
    {
        $this->validate($request, [
            'response' => 'present|string',
            'status' => 'required|integer'
        ]);

        $qrequest = \App\QuotaRequest::find($id);
        $qrequest->response = $request->input('response');
        $qrequest->status   = $request->input('status');

        if ($request->input('status') == 1)
        {
            $qrequest->user->num_quotas = $qrequest->howmuch;

            $qrequest->user->payBonusToReferrer($qrequest->howmuch);

            $qrequest->user->save();
        }

        $qrequest->save();

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $qrequest = \App\QuotaRequest::find($id);

        if (!$qrequest) abort(404);

        return response(file_get_contents($this->get_receipt_path($qrequest->user, $qrequest->receipt_path)))
            ->header('Content-Type', mime_content_type($this->get_receipt_path($qrequest->user, $qrequest->receipt_path)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\QuotaRequest::destroy($id);

        return redirect()->route('admin.qrequests.index');
    }
}
