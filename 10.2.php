<?php

$data = explode("\n", file_get_contents('10.txt'));

$data[] = 0;
sort($data);
$data[] = $data[count($data) - 1] + 3;

$len = count($data);
$cache = [];
$cache[$len - 1] = 1;

for ($x = $len - 2; $x >= 0; $x--) {
    $count = 0;
    for ($y = $x + 1; $y < $len && $data[$y] - $data[$x] <= 3; $y++) {
        $count += $cache[$y];
    }
    $cache[$x] = $count;
}

echo $cache[0] . "\n";