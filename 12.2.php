<?php

$data = explode("\n", file_get_contents('12.txt'));

$wp = [10,-1];
$coords = [0,0];
foreach ($data as $mov) {
    $ltr = substr($mov, 0, 1);
    $val = intval(substr($mov, 1));
    if ($ltr === 'N') {
        $wp[1] -= $val;
    } else if ($ltr === 'S') {
        $wp[1] += $val;
    } else if ($ltr === 'E') {
        $wp[0] += $val;
    } else if ($ltr === 'W') {
        $wp[0] -= $val;
    } else if ($ltr === 'L') {
        $wp = rotate($wp, 360-$val);
    } else if ($ltr === 'R') {
        $wp = rotate($wp, $val);
    } else if ($ltr === 'F') {
        $coords[0] += $wp[0] * $val;
        $coords[1] += $wp[1] * $val;
    }
}
echo (abs($coords[0]) + abs($coords[1])) . "\n";

function rotate($c, $angle) {
    if ($angle === 90) return [$c[1]*-1, $c[0]];
    else if ($angle === 180) return [$c[0]*-1, $c[1]*-1];
    else if ($angle === 270) return [$c[1], $c[0]*-1];
}