<?php

$data = explode("\n", file_get_contents('2.txt'));
$counter = 0;
foreach ($data as $line) {
    $tokens = explode(' ', $line);
    $range = explode('-', $tokens[0]);
    $letter = rtrim($tokens[1], ':');
    $password = $tokens[2];
    $occ = substr_count($password, $letter);
    if ($occ >= $range[0] && $occ <= $range[1]) $counter++;
}
echo "{$counter}\n";
