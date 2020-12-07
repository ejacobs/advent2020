<?php

$data = explode("\n", file_get_contents('7.txt'));

$chain = [];
foreach ($data as $line) {
    $parts = explode(' contain ', $line);
    $allowed = explode(', ', $parts[1]);
    $key = $parts[0];
    $key = trim(preg_replace('/bags$/', '', $key));
    foreach ($allowed as $allowedColor) {
        $allowedColor = substr($allowedColor, 2);
        $allowedColor = rtrim($allowedColor, '.');
        $allowedColor = preg_replace('/bags$/', '', $allowedColor);
        $allowedColor = preg_replace('/bag$/', '', $allowedColor);
        if (!isset($chain[$key])) $chain[$key] = [];
        $chain[$key][] = trim($allowedColor);
    }
}

$count = 0;
foreach ($chain as $key => $allowed) {
    $count += checkChain($chain, $key);
}

function checkChain($chain,  $curr): int {
    $allowed = $chain[$curr] ?? [];
    if (in_array('shiny gold', $allowed))
        return 1;
    foreach ($allowed as $color) {
        if (checkChain($chain, $color) === 1) {
            return 1;
        }
    }
    return 0;
}

echo $count . "\n";