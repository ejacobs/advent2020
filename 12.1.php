<?php

$data = explode("\n", file_get_contents('12.txt'));

$orn = 90;
$coords = [0,0];
foreach ($data as $mov) {
    $ltr = substr($mov, 0, 1);
    $val = intval(substr($mov, 1));
    if ($ltr === 'N') {
        $coords[1] -= $val;
    } else if ($ltr === 'S') {
        $coords[1] += $val;
    } else if ($ltr === 'E') {
        $coords[0] += $val;
    } else if ($ltr === 'W') {
        $coords[0] -= $val;
    } else if ($ltr === 'L') {
        $orn = ($orn - $val) % 360;
        if ($orn < 0) $orn = 360 - abs($orn);
    } else if ($ltr === 'R') {
        $orn = ($orn + $val) % 360;
        if ($orn < 0) $orn = 360 - abs($orn);
    } else if ($ltr === 'F') {
        if ($orn === 0) {
            $coords[1] -= $val;
        } else if ($orn === 90) {
            $coords[0] += $val;
        } else if ($orn === 180) {
            $coords[1] += $val;
        } else if ($orn === 270) {
            $coords[0] -= $val;
        }
    }
}
echo (abs($coords[0]) + abs($coords[1])) . "\n";