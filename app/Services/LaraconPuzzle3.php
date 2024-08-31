<?php

namespace App\Services;

class LaraconPuzzle3
{
    public static function solve(string $x): string
    {
        // Start output buffering
        ob_start();

        // SOLUTION (276 bytes)
        // * Variable Substitution
        // * Remove Unused Variables
        // * Remove Variables
        // * Remove Comments
        // * Remove Whitespace
        // * Variable Substitution
        // * Remove Whitespace
        // * Remove Array Init
        // * Remove Braces
        // * Remove Whitespace
        // * Refactor Decrement
        // * Remove Variable

        foreach(explode("\n",$x)as$x=>$l)for($y=0;$y<10;$y++)$d[$x][$y]=$l[$y]??'';for($y=10;$y>=0;$y--){$f=9;for($x=9;$x>=0;$x--){if(!empty($d[$x][$y])){$d[$f--+1][$y]=$d[$x][$y];$d[$x][$y]='';}}}for($x=2;$x<11;$x++){$l='';for($y=0;$y<=10;$y++)$l.=$d[$x][$y]??'';echo trim($l)."\n";}

        // Return output buffer and stop output buffering
        return ob_get_clean();
    }
}
