<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartsController extends Controller
{
    public $symbol;

    public function index() 
    {
        return view('user.charts.index', [
             'symbol' => request()->route('symbol')
        ]);
    }
}
