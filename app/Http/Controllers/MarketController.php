<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MarketController extends Controller
{
    public function index(): View
    {
        return view('market');
    }
}
