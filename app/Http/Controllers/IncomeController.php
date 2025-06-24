<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class IncomeController extends Controller
{
    public function index(): View
    {
        $series = [
            'Selic' => 11,
            'CDI' => 12,
            'IPCA' => 433,
            'IGP-M' => 189,
        ];

        $rates = [];
        foreach ($series as $name => $code) {
            try {
                $url = "https://api.bcb.gov.br/dados/serie/bcdata.sgs.{$code}/dados/ultimos/1?formato=json";
                $response = Http::timeout(5)->get($url);
                if ($response->successful()) {
                    $data = $response->json();
                    $value = $data[0]['valor'] ?? null;
                    $date = $data[0]['data'] ?? null;
                    $rates[] = [
                        'name' => $name,
                        'value' => $value,
                        'date' => $date,
                    ];
                }
            } catch (\Throwable $e) {
                // ignore errors for individual series
            }
        }

        return view('income', ['rates' => $rates]);
    }
}
