<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BalancesController extends Controller
{
    public function index() 
    {
        return view('user.balances');
    }
}
