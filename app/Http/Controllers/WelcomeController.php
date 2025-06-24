<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function index(): View
    {
        $symbols = [
            'IBOVESPA' => '%5EBVSP',
            'PETR4.SA' => 'PETR4.SA',
            'VALE3.SA' => 'VALE3.SA',
            'ITUB4.SA' => 'ITUB4.SA',
            'BBDC4.SA' => 'BBDC4.SA',
        ];

        $stocks = [];
        foreach ($symbols as $name => $symbol) {
            try {
                $response = Http::timeout(5)->get("https://query1.finance.yahoo.com/v8/finance/chart/{$symbol}?range=1d&interval=1d");
                if ($response->successful()) {
                    $data = $response->json();
                    $result = $data['chart']['result'][0] ?? null;
                    if ($result) {
                        $meta = $result['meta'] ?? [];
                        $quote = $result['indicators']['quote'][0] ?? [];
                        $stocks[] = [
                            'name' => $name,
                            'price' => $meta['regularMarketPrice'] ?? null,
                            'open'  => $quote['open'][0] ?? null,
                            'high'  => $quote['high'][0] ?? null,
                            'low'   => $quote['low'][0] ?? null,
                        ];
                    }
                }
            } catch (\Throwable $e) {
                // ignore errors for individual symbols
            }
        }

        return view('welcome', ['stocks' => $stocks]);
    }
}
