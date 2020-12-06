<?php

$data   = explode("\n", file_get_contents('6.txt'));
$data[] = '';

$yeses      = [];
$count      = 0;
$groupCount = 0;
foreach ($data as $line) {
    if (trim($line) === '') {
        foreach ($yeses as $yes) {
            if ($yes == $groupCount) {
                $count++;
            }
        }
        $yeses      = [];
        $groupCount = 0;
        continue;
    }
    $groupCount++;
    $letters = str_split($line);
    foreach ($letters as $letter) {
        $yeses[$letter] ??= 0;
        $yeses[$letter]++;
    }
}

echo $count . "\n";