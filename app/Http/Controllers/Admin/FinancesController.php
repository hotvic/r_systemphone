<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FinancesController extends Controller
{
    public function index()
    {
        return view('admin.finances.index');
    }

    public function investments()
    {
        // TODO: TODO
    }

    public function newInvestment($id=null)
    {
        $data = [
            'usr' => $id != null ? \App\User::find($id) : null,
        ];

        return view('admin.finances.new_investment', $data);
    }


    public function newEarning($id=null)
    {
        $data = [
            'usr' => $id != null ? \App\User::find($id) : null,
        ];

        return view('admin.finances.new_earning', $data);
    }
}
