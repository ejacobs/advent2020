<?php

$data = explode("\n", file_get_contents('2.txt'));
$counter = 0;
foreach ($data as $line) {
    $tokens = explode(' ', $line);
    $range = explode('-', $tokens[0]);
    $letter = rtrim($tokens[1], ':');
    $password = $tokens[2];
    $occ = substr_count($password, $letter);
    if ($password[$range[0]-1] == $letter xor $password[$range[1]-1] == $letter) {
        $counter++;
    }
}
echo "{$counter}\n";