## Laracon 2024 Puzzles

My solutions to the puzzles and contests at Laracon (Laravel Conference) 2024 in Deep Ellum, Dallas TX

## Tighten Puzzles

I was not aware of the [Tighten Puzzles](https://puzzle.tighten.com/) until Tighten mentioned them on stage in the middle of day 2. The contest had been open for 24+ hours, so I could not compete for first to complete. 

I focused my efforts on smallest solution. For the following 3 puzzles, I scored 2nd, 2nd, and 3rd place, respectively. I was able to reconstruct my process through multiple commits. You can compare my commit messages and changes in each commit to understand how I solved each puzzle and minified my results through an iterative approach.

### Puzzle 1: DRAGONS NOT PRESENT

#### PROBLEM STATEMENT

The paths.php file in Laravel used to include a friendly ASCII dragon. If we want Taylor to bring it back, we need to make some changes ... flip the dragon to face the other direction, making sure to also flip any “reversible” characters like ")" → "(" and "b" → "d".

#### APPROACH

I split the input into individual lines, reversed and substituted characters as I iterated each line. I then joined the lines back together and printed the result.

#### NOTES

This was my first attempt at a minifying solution. I believe I could have applied a few techniques I discovered while solving puzzle 3 to further reduce the size of my solution.

#### My Solution (2nd place, 129 bytes)
``` php
foreach($e=explode("\n",$x) as$k=>$l){$e[$k]=strtr(rtrim(strrev(str_pad($l,68))),'bd()<>/\\','db)(><\\/');}echo implode("\n",$e);
```

#### Top Solution (1st place, 91 bytes, bakerkretzmar)
``` php
foreach(explode("
",$x)as$l)echo chop(strrev(str_pad(strtr($l,')(>/\b','()<\/d'),68)))."
";
```

### Puzzle 2: ARRAY TO TABLE

#### PROBLEM STATEMENT

Given a JSON string of data, print it as a table. The first row should be the keys, and the following rows should be the values. The table should be wrapped with a border of +, -, and | characters.

#### APPROACH

I defined metadata for each column (Column Name and Column Width), decoded the JSON input into an array, constructed separator and title and data lines, then printed the result. During minification, I reduced the metadata to a list of column widths and calculated column header names from the JSON property names.

#### NOTES

This was my second attempt at a minifying solution. I believe I could have applied a few techniques I discovered while solving puzzle 3 to further reduce the size of my solution.

#### My Solution (2nd place, 423 bytes)
``` php
$j=json_decode($x,1);$m=array_combine(array_keys($j[0]),[26,11,16,44]);$y=[];foreach($m as$k=>$l){$w[]=str_repeat('-',$l);$n=ucwords(str_replace('_',' ',$k));$y[]=str_pad($n,$l-2);}$s='+'.implode('+',$w)."+\n";$t='| '.implode(' | ',$y)." |\n";$b='';foreach($j as$c){$z=[];foreach($m as$k=>$l){$v=$c[$k];if($k[0]==='b'){$v='$'.number_format($v);}$z[]=str_pad($v,$l-2);}$b.='| '.implode(' | ',$z)." |\n";}echo $s.$t.$s.$b.$s;
```

#### Top Solution (1st place, 342 bytes, bakerkretzmar)
``` php
$p='str_pad';$r=fn($n)=>str_repeat('-',$n);echo($s="+{$r(26)}+{$r(11)}+{$r(16)}+{$r(44)}+
")."| {$p('Landmark',25)}| {$p('City',10)}| {$p('Build Cost',15)}| {$p('Attendance Record',43)}|
$s";foreach(json_decode($x,1)as$i){$v=array_values($i);echo"| {$p($v[0],25)}| {$p($v[1],10)}| {$p('$'.number_format($v[2]),15)}| {$p($v[3],43)}|
";}echo$s;
```

### Puzzle 3: SYSTEM COLLAPSE

#### PROBLEM STATEMENT

Imagine a set of words, each on their own line. Now, turn on the gravity, and let the letters fall straight down. You’re given the newline-separated list of words below, and you must output the result of the letters falling vertically down until they “stand” on something.

#### APPROACH

I loaded the input into a multi-dimension array, then iterated through each column to drop the letters.

#### NOTES

I believe I could have further optimised this solution another 10-20 bytes by correcting an error in the original code, but I would need to think of a completely different (much more efficient) approach before I could compete with 1st/2nd place winners.

#### My Solution (3rd place, 250 bytes)
``` php
foreach(explode("\n",$x)as$x=>$l)for($y=0;$y<10;$y++)$d[$x][$y]=$l[$y]??'';for($y=10;$y>=0;$y--){$f=9;for($x=9;$x>=0;$x--)if($d[$x][$y]){$d[$f--+1][$y]=$d[$x][$y];$d[$x][$y]='';}}for($x=2;$x<11;$x++){for($y=0;$y<=10;$y++)echo$d[$x][$y]??'';echo"\n";}
```

#### Top Solution (1st place, 170 bytes, bakerkretzmar)
``` php
$r='array_column';$o=array_map('str_split',array_reverse(explode("
",$x)));$a=Arr::map(range(0,9),fn($_,$i)=>$r($o,$i));foreach(range(8,0)as$i)echo"
".join('',$r($a,$i));
```
