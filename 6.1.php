<?php

$data = explode("\n", file_get_contents('6.txt'));

$yeses = [];
$count = 0;
foreach ($data as $line) {
    if (trim($line) === '') {
        $count += count($yeses);
        $yeses = [];
        continue;
    }
    $letters = str_split($line);
    foreach ($letters as $letter) {
        $yeses[$letter] = true;
    }
}
$count += count($yeses);

echo $count . "\n";