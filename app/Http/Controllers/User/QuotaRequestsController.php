<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuotaRequestsController extends Controller
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
        $requests = \Auth::user()->quota_requests()->where('status', '0')->paginate(15);

        return view('user.finances.qrequests.index')
            ->with('requests', $requests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.finances.qrequests.create')
            ->with('user', \Auth::user());
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
            'howmuch'  => 'required|integer'
        ]);

        \Storage::makeDirectory('receipts/' . \Auth::user()->username);

        $new_receipt = $request->file('receipt')->move($this->get_receipt_dir(), sprintf("%d.%s", time(), $request->file('receipt')->getClientOriginalExtension()));

        \Auth::user()->quota_requests()->create([
            'howmuch' => $request->input('howmuch'),
            'receipt_path' => \Auth::user()->username . '/' . $new_receipt->getBasename(),
        ]);

        return redirect()->route('user.finance.qrequests.index');
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
}
