<?php

$data = array_flip(explode("\n", file_get_contents('1.txt')));
ksort($data);
foreach($data as $val => $i) if (isset($data[2020-$val])) {$ans = $val*(2020-$val); echo "{$ans}\n"; break;}
