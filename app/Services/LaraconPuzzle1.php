<?php

namespace App\Services;

class LaraconPuzzle1
{
    public static function solve(string $x): string
    {
        // Start output buffering
        ob_start();

        // SOLUTION (684 bytes)
        $lines = explode("\n", $x);
        $length = 0;
        foreach ($lines as $line) {
            if (strlen($line) > $length) {
                $length = strlen($line);
            }
        }
        $length++;

        foreach ($lines as $key => $line) {
            // pad all lines to the same length
            $string = str_pad($line, $length, ' ', STR_PAD_RIGHT);
            // reverse the line
            $string = strrev($string);
            // trim whitespace from RIGHT side of the line
            $string = rtrim($string);
            // replace all '(' with ')' and vice versa
            // replace all '/' with '\' and vice versa
            // replace all '<' with '>' and vice versa
            $string = strtr($string, 'bd()<>/\\', 'db)(><\\/');

            $lines[$key] = $string;
        }

        echo implode("\n", $lines);

        // Return output buffer and stop output buffering
        return ob_get_clean();
    }
}
