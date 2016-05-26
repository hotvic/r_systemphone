<?php

namespace App\Http\Controllers\Admin;

use App\Quota;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.finances.quotas.index')
            ->with('quotas', Quota::paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.finances.quotas.create');
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
            'text' => 'required|string',
            'amount' => 'required|digits_between:3,15'
        ]);

        \App\Quota::create([
            'amount' => $request->input('amount') / 100,
            'text' => $request->input('text')
        ]);

        return redirect()->route('admin.finance.quotas.index');
    }

    public function attach(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id'
        ]);

        $client = \App\User::find($request->input('user_id'));

        return view('admin.finances.quotas.attach')
            ->with('client', $client)
            ->with('quotas', \App\Quota::all());
    }

    public function postAttach(Request $request)
    {
        $this->validate($request, [
            'client_id' => 'required|exists:users,id',
            'howmuch' => 'required|integer',
            'quota' => 'required|exists:quotas,id'
        ]);

        $user = \App\User::find($request->input('client_id'));

        for ($i = 0; $i < $request->input('howmuch'); $i++)
        {
            $user->quotas()->attach($request->input('quota'));
        }

        return redirect()->route('admin::users');
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
        \App\Quota::destroy($id);

        return redirect()->route('admin.finance.quotas.index');
    }
}
