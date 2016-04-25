<?php

namespace App\Http\Controllers\Admin;

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
        $earnings = \App\Earning::orderBy('id', 'ASC')->take(15);

        if ($request->has('page'))
            $earnings->skip(15 * $request->input('page'));

        if ($request->has('s'))
            $earnings->where('description', 'LIKE', psp($request->input('s')));

        return view('admin.finances.earnings.index')
            ->with('earnings', $earnings->get()->all())
            ->with('earnings_count', \App\Earning::get()->count())
            ->with('cur_page', $request->input('page', 0) + 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.finances.earnings.create')
            ->with('client', $request->has('user_id') ? \App\User::find($request->input('user_id')) : null);
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
            'email' => 'required|email|exists:users,email',
            'amount' => 'required|digits_between:3,15'
        ]);

        $user = \App\User::where('email', '=', $request->input('email'))->first();

        $user->earnings()->create([
            'amount' => $request->input('amount') / 100,
            'description' => $request->input('description')
        ]);

        return redirect()->route('admin.earnings.index');
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
        \App\Earning::destroy($id);

        return redirect()->route('admin.earnings.index');
    }
}
