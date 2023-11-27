<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index() {
        $data = [
            'actual' => $this->generateRandomPositive(10),
            'plan' => $this->generateRandomPositive(10),
            'Nloader' => $this->generateRandom(10),
            'EWH' => $this->generateRandom(10),
            'prodity' => $this->generateRandom(10),
        ];

        $data['actual'][5] = null;
        $data['plan'][5] = null;
        $data['Nloader'][5] = null;
        $data['EWH'][5] = null;
        $data['prodity'][5] = null;
        $data['actual'][18] = null;
        $data['plan'][18] = null;
        $data['Nloader'][18] = null;
        $data['EWH'][18] = null;
        $data['prodity'][18] = null;

        return response()->json($data);
    }

    private function generateRandom($interval) {
        $data = [];
        for ($i = 0; $i < 24; $i++) {
            $value = rand(-2000, 4000);

            $dataValue = round($value / $interval) * $interval;
            $data[] = $dataValue;
        }

        return $data;
    }

    private function generateRandomPositive($interval) {
        $data = [];
        for ($i = 0; $i < 24; $i++) {
            $value = rand(0, 8000);
            
            $dataValue = round($value / $interval) * $interval;
            $data[] = $dataValue;
        }

        return $data;
    }
}
