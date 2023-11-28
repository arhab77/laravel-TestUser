<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Chart2Controller extends Controller
{
    public function index() {
        $data = [
            "labels"=> ['operator', 'status', 'reason', 'activity'],
            "datasets"=> [
                ["label" => "Operator", "y" => "operator", "backgroundColor" => "black", "data" => ["awal" => "07:00","akhir" => "19:00"]],

                ["label" => "Delay", "y" => "status", "backgroundColor" => "goldenrod", "data" => ["awal" => "07:00","akhir" => "07:30"]],
                ["label" => "Ready", "y" => "status", "backgroundColor" => "green", "data" => ["awal" => "07:30","akhir" => "12:00"]],
                ["label" => "Delay", "y" => "status", "backgroundColor" => "goldenrod", "data" => ["awal" => "12:00","akhir" => "13:00"]],
                ["label" => "Ready", "y" => "status", "backgroundColor" => "green", "data" => ["awal" => "13:00","akhir" => "15:15"]],
                ["label" => "Delay", "y" => "status", "backgroundColor" => "goldenrod", "data" => ["awal" => "15:15","akhir" => "15:45"]],
                ["label" => "Ready", "y" => "status", "backgroundColor" => "green", "data" => ["awal" => "15:45","akhir" => "18:30"]],
                ["label" => "Delay", "y" => "status", "backgroundColor" => "goldenrod", "data" => ["awal" => "18:30","akhir" => "19:00"]],

                ["label" => "Change Shift", "y" => "reason", "backgroundColor" => "goldenrod", "data" => ["awal" => "07:00","akhir" => "07:30"]],
                ["label" => "Production", "y" => "reason", "backgroundColor" => "green", "data" => ["awal" => "07:30","akhir" => "10:40"]],
                ["label" => "General Work", "y" => "reason", "backgroundColor" => "green", "data" => ["awal" => "10:40","akhir" => "12:00"]],
                ["label" => "Rest Time", "y" => "reason", "backgroundColor" => "goldenrod", "data" => ["awal" => "12:00","akhir" => "13:00"]],
                ["label" => "Production", "y" => "reason", "backgroundColor" => "green", "data" => ["awal" => "13:00","akhir" => "15:15"]],
                ["label" => "Sholat", "y" => "reason", "backgroundColor" => "goldenrod", "data" => ["awal" => "15:15","akhir" => "15:45"]],
                ["label" => "Production", "y" => "reason", "backgroundColor" => "green", "data" => ["awal" => "15:45","akhir" => "18:30"]],
                ["label" => "Change Shift", "y" => "reason", "backgroundColor" => "goldenrod", "data" => ["awal" => "18:30","akhir" => "19:00"]],

                ["label" => "", "y" => "activity", "backgroundColor" => "dimgray", "data" => ["awal" => "07:00","akhir" => "07:30"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "blue", "data" => ["awal" => "07:30","akhir" => "07:50"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "lightblue", "data" => ["awal" => "07:50","akhir" => "08:00"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "blue", "data" => ["awal" => "08:00","akhir" => "08:55"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "lightblue", "data" => ["awal" => "08:55","akhir" => "09:00"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "blue", "data" => ["awal" => "09:00","akhir" => "09:58"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "lightblue", "data" => ["awal" => "09:58","akhir" => "10:00"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "blue", "data" => ["awal" => "10:00","akhir" => "10:40"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "lightblue", "data" => ["awal" => "10:40","akhir" => "12:00"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "dimgray", "data" => ["awal" => "12:00","akhir" => "13:00"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "lightblue", "data" => ["awal" => "13:00","akhir" => "13:10"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "blue", "data" => ["awal" => "13:10","akhir" => "13:30"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "lightblue", "data" => ["awal" => "13:30","akhir" => "13:35"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "blue", "data" => ["awal" => "13:35","akhir" => "14:00"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "lightblue", "data" => ["awal" => "14:00","akhir" => "14:02"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "blue", "data" => ["awal" => "14:02","akhir" => "14:20"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "lightblue", "data" => ["awal" => "14:20","akhir" => "15:00"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "blue", "data" => ["awal" => "15:00","akhir" => "15:15"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "dimgray", "data" => ["awal" => "15:15","akhir" => "15:45"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "lightblue", "data" => ["awal" => "15:45","akhir" => "15:50"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "blue", "data" => ["awal" => "15:50","akhir" => "16:15"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "lightblue", "data" => ["awal" => "16:15","akhir" => "16:25"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "blue", "data" => ["awal" => "16:25","akhir" => "17:10"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "lightblue", "data" => ["awal" => "17:10","akhir" => "17:40"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "blue", "data" => ["awal" => "17:45","akhir" => "17:50"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "lightblue", "data" => ["awal" => "17:50","akhir" => "18:00"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "blue", "data" => ["awal" => "18:00","akhir" => "18:30"]],
                ["label" => "", "y" => "activity", "backgroundColor" => "dimgray", "data" => ["awal" => "18:30","akhir" => "19:00"]],
            ]
        ];

        return response()->json($data);
    }
    private function generateTimeRange($startTime, $endTime) {
        $interval = 60; // in minutes
        $startDateTime = new \DateTime('2023-11-28 ' . $startTime);
        $endDateTime = new \DateTime('2023-11-28 ' . $endTime);
        $currentDateTime = clone $startDateTime;

        $timeRange = [];

        while ($currentDateTime <= $endDateTime) {
            $nextDateTime = clone $currentDateTime;
            $nextDateTime->modify("+$interval minutes");

            $timeRange[] = [
                "awal" => $currentDateTime->format('H:i'),
                "akhir" => $nextDateTime->format('H:i'),
            ];

            $currentDateTime = $nextDateTime;
        }

        return $timeRange;
    }
}
