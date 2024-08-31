<?php

namespace App\Services;

class LaraconPuzzle1
{
    public static function solve(string $x): string
    {
        // Start output buffering
        ob_start();

        // SOLUTION (202 bytes)
        // * Variable Substitution
        // * Remove Comments
        // * Remove Variables
        // * Remove Whitespace
        // * Remove Default Parameters

        $e=explode("\n",$x);$i=0;foreach($e as $l){if(strlen($l)>$i){$i=strlen($l);}}$i++;foreach($e as $k=>$l){$s=str_pad($l,$i);$e[$k]=strtr(rtrim(strrev($s)),'bd()<>/\\','db)(><\\/');}echo implode("\n", $e);

        // Return output buffer and stop output buffering
        return ob_get_clean();
    }
}
