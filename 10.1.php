<?php

$data = explode("\n", file_get_contents('10.txt'));

sort($data);
$one = 0;
$three = 0;
foreach ($data as $i => $line) {

    if (!isset($data[$i-1])) $last = 0;
    else $last = $data[$i-1];
    $diff = $data[$i] - $last;
    if ($diff === 1) $one++;
    else if ($diff === 3) $three++;

}
echo $one . "\n";
echo $three . "\n";
echo ($one * ($three+1)) . "\n";