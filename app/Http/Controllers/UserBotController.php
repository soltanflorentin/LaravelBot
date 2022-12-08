<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserBotController extends Controller
{
    public function index() 
    {
       return view('user.bot');
    }
}
