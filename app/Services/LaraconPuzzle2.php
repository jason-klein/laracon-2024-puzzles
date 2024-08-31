<?php

namespace App\Services;

class LaraconPuzzle2
{
    public static function solve(string $x): string
    {
        // Start output buffering
        ob_start();

        // SOLUTION (432 bytes)
        // * Variable Substitution
        // * Reduce Metadata (calculate Column Names from Key Names)
        // * Remove Default Parameters
        // * Remove Comments
        // * Remove Whitespace
        // * Optimize Parameter
        // * Optimize Comparison

        $j=json_decode($x,1);$m=array_combine(array_keys($j[0]),[26,11,16,44]);$w=[];$y=[];foreach($m as $k=>$l){$w[]=str_repeat('-',$l);$n=ucwords(str_replace('_',' ',$k));$y[]=str_pad($n,$l-2);}$s='+'.implode('+',$w)."+\n";$t='| '.implode(' | ',$y)." |\n";$b='';foreach($j as $c){$z=[];foreach($m as $k=>$l){$v=$c[$k];if($k[0]==='b'){$v='$'.number_format($v);}$z[]=str_pad($v,$l-2);}$b.='| '.implode(' | ',$z)." |\n";}echo $s.$t.$s.$b.$s;

        // Return output buffer and stop output buffering
        return ob_get_clean();
    }
}
