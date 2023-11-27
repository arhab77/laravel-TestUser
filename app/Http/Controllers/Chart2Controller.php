<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Chart2Controller extends Controller
{
    public function index() {
        $operators = ['Heru Prasetyo', 'Budi Wardoyo', 'Hit Levite', 'Ibnu Mulyanto'];
        $statuses = ['Ready','Delay','StandBy','Breakdown'];
        $reasons = ['Production','General Work','Change Shift','Rest Time','Sholat'];
        $activities = ['Empty Travel','Loaded Travel','Loading','Dumpling'];

        shuffle($operators);
        $selectOperator = $operators[0];
        $data = [];

        for($i = 0; $i < 13; $i++) {
            shuffle($statuses);
            shuffle($activities);
            shuffle($reasons);

            $status = $statuses[0];
            $selectedReason = $reasons[0];

            if(($i == 0) || ($i == 12)) {
                $status = 'Delay';
                $selectedReason = 'Change Shift';
            } elseif ((($i == 5) || ($i == 8))) {
                $status = 'Delay';
                $reasonData = ['Rest Time','Sholat'];
                shuffle($reasonData);
                $selectedReason = $reasonData[0];
            } else {
                $status = 'Ready';
                $reasonData = ['Production','General Work'];
                shuffle($reasonData);
                $selectedReason = $reasonData[0];
            }

            $data[$i] = [
                'status' => $status,
                'reason' => isset($selectedReasons) ? $selectedReasons[0] : $selectedReason,
                'activity' => $activities[0],
                'timeStart' => sprintf('%02d:00', 7 + $i),
                'timeEnd' => sprintf('%02d:00',8 + $i),
                'duration' => ((8 + $i)-(7 + $i)) * 60
            ];
        }

        return response()->json(['operator' => $selectOperator, 'data' => $data]);
    }
}
