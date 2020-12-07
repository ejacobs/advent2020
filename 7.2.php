<?php

$data = explode("\n", file_get_contents('7.txt'));

$chain = [];
foreach ($data as $line) {
    $parts = explode(' contain ', $line);
    $allowed = explode(', ', $parts[1]);
    $key = $parts[0];
    $key = trim(preg_replace('/bags$/', '', $key));
    foreach ($allowed as $allowedColor) {
        $allowedColor = rtrim($allowedColor, '.');
        $allowedColor = preg_replace('/bags$/', '', $allowedColor);
        $allowedColor = preg_replace('/bag$/', '', $allowedColor);
        if (!isset($chain[$key])) $chain[$key] = [];
        $chain[$key][] = trim($allowedColor);
    }
}

$count = countChildren($chain, '1 shiny gold');

function countChildren($chain, $curr): int {
    $colorName = substr(strstr($curr," "), 1);
    $allowed = $chain[$colorName] ?? [];
    $ret = 0;
    foreach ($allowed as $color) {
        if ($color === 'no other') continue;
        echo $color . "\n";
        $colorCount = explode(' ', trim($color))[0];
        $ret += $colorCount + ($colorCount * countChildren($chain, $color));
    }
    return $ret;
}

echo $count . "\n";
