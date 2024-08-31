<?php

namespace App\Services;

class LaraconPuzzle3
{
    public static function solve(string $x): string
    {
        // Start output buffering
        ob_start();

        // SOLUTION (648 bytes)
        // * Variable Substitution
        // * Remove Unused Variables
        // * Remove Variables

        $d = [];
        foreach (explode("\n", $x) as $x => $l) {
            // loop through each character in $line
            for ($y = 0; $y < 10; $y++) {
                $d[$x][$y] = $l[$y]??'';
            }
        }

        // loop through all lines in reverse
        for ($y = 10; $y >= 0; $y--) {
            $f = 9;
            for ($x = 9; $x >= 0; $x--) {
                if (!empty($d[$x][$y])) {
                    $d[$f+1][$y] = $d[$x][$y];
                    $d[$x][$y] = '';
                    $f--;
                }
            }
        }

        // consolidate data array into lines
        $output = '';
        for ($x = 2; $x < 11; $x++) {
            $l = '';
            for ($y = 0; $y <= 10; $y++) {
                $l .= $d[$x][$y] ?? ' ';
            }
            $output .= trim($l)."\n";
        }

        // output
        echo $output;

        // Return output buffer and stop output buffering
        return ob_get_clean();
    }
}
