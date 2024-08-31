<?php

namespace App\Services;

class LaraconPuzzle2
{
    public static function solve(string $x): string
    {
        // Start output buffering
        ob_start();

        // SOLUTION (958 bytes)

        $records = json_decode($x, true);

        $meta = [
            'landmark' => ['Landmark', 26],
            'city' => ['City', 11],
            'build_cost' => ['Build Cost', 16],
            'attendance_record' => ['Attendance Record', 44],
        ];

        // header
        $separatorParts = [];
        $titleParts = [];
        foreach ($meta as $vals) {
            $separatorParts[] = str_repeat('-', $vals[1]);
            $titleParts[] = str_pad($vals[0], $vals[1] - 2, ' ', STR_PAD_RIGHT);
        }
        $separator = '+'.implode('+', $separatorParts)."+\n";
        $title = '| '.implode(' | ', $titleParts)." |\n";

        // body
        $body = '';
        foreach ($records as $record) {
            $bodyParts = [];
            foreach ($meta as $key => $vals) {
                $string = $record[$key];
                if ($key === 'build_cost') {
                    $string = '$'.number_format($string, 0);
                }
                $bodyParts[] = str_pad($string, $vals[1] - 2, ' ', STR_PAD_RIGHT);
            }
            $body .= '| '.implode(' | ', $bodyParts)." |\n";
        }

        // output
        echo $separator.$title.$separator.$body.$separator;

        // Return output buffer and stop output buffering
        return ob_get_clean();
    }
}
