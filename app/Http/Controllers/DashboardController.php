<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class DashboardController extends Controller
{
    public function index(){
        $title = "Dashboard";
        $style = "css/dashboard.css";
        return view('dashboard', compact('title', 'style'));
    }


}
