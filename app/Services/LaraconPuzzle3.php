<?php

namespace App\Services;

class LaraconPuzzle3
{
    public static function solve(string $x): string
    {
        // Start output buffering
        ob_start();

        // SOLUTION (891 bytes)

        $lines = explode("\n", $x);

        $data = [];
        $rows = 0;
        $cols = 0;
        foreach ($lines as $x => $line) {
            // loop through each character in $line
            for ($y = 0; $y < 10; $y++) {
                $data[$x][$y] = $line[$y] ?? null;
                if ($y > $cols) {
                    $cols = $y;
                }
            }
            if ($x > $rows) {
                $rows = $x;
            }
        }

        // loop through all lines in reverse
        for ($y = 10; $y >= 0; $y--) {
            $xFull = 9;
            for ($x = 9; $x >= 0; $x--) {
                if (!empty($data[$x][$y])) {
                    //echo 'swap '.$x.' '.$y."\n";
                    $data[$xFull+1][$y] = $data[$x][$y];
                    $data[$x][$y] = '';
                    $xFull--;
                }
            }
        }

        // consolidate data array into lines
        $output = '';
        for ($x = 2; $x < 11; $x++) {
            $line = '';
            for ($y = 0; $y <= 10; $y++) {
                $line .= $data[$x][$y] ?? ' ';
            }
            $output .= trim($line)."\n";
        }

        // output
        echo $output;

        // Return output buffer and stop output buffering
        return ob_get_clean();
    }
}
