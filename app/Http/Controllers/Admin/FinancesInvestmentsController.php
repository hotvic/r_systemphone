<?php

namespace App\Http\Controllers\Admin;

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
        $investments = \App\Investment::orderBy('id', 'ASC')->take(15);

        if ($request->has('page'))
            $investments->skip(15 * $request->input('page'));

        if ($request->has('s'))
            $investments->where('description', 'LIKE', psp($request->input('s')));

        $investments = $investments->get();

        return view('admin.finances.investments.index')
            ->with('investments', $investments->all())
            ->with('investments_count', \App\Investment::get()->count())
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
        $description = '';

        if ($request->has('user_id') && $user = \App\User::find($request->input('user_id')))
        {
            $description = sprintf('Investimento %s', $user->investments->count() + 1);
        }

        return view('admin.finances.investments.create')
            ->with('client', $request->has('user_id') ? \App\User::find($request->input('user_id')) : null)
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
            'email' => 'required|email|exists:users,email',
            'amount' => 'required|digits_between:3,15'
        ]);

        $user = \App\User::where('email', '=', $request->input('email'))->first();

        $user->investments()->create([
            'amount' => $request->input('amount') / 100,
            'description' => $request->input('description'),
            'type' => 'manual'
        ]);

        return redirect()->route('admin.investments.index');
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
