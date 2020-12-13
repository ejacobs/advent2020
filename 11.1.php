<?php

$data = explode("\n", file_get_contents('11.txt'));
$w = strlen($data[0]);
$h = count($data);

$seats = [];
foreach ($data as $i => $line) {
    $seats[$i] = [];
    $cols = str_split($line);
    foreach ($cols as $j => $col) {
        $seats[$i][$j] = $col;
    }
}

$changed = true;
while ($changed) {
    $changed = false;
    $tmp = $seats;
    foreach ($tmp as $i => $row) {
        foreach ($row as $j => $col) {
            if ($col === '.') continue;
            if ($col === 'L') {
                for ($x=-1;$x<=1;$x++) {
                    if ($i+$x < 0 || $i+$x+1>$h) continue;
                    for ($y=-1;$y<=1;$y++) {
                        if ($j+$y < 0 || $j+$y+1>$w) continue;
                        if ($x === 0 && $y === 0) continue;
                        if ($tmp[$i+$x][$j+$y] === '#') continue(3);
                    }
                }
                $seats[$i][$j] = '#';
                $changed = true;
            } else if ($col === '#') {
                $adj = 0;
                for ($x=-1;$x<=1;$x++) {
                    if ($i+$x < 0 || $i+$x+1>$h) continue;
                    for ($y=-1;$y<=1;$y++) {
                        if ($j+$y < 0 || $j+$y+1>$w) continue;
                        if ($x === 0 && $y === 0) continue;
                        if ($tmp[$i+$x][$j+$y] === '#') $adj++;
                        if ($adj >= 4) continue(2);
                    }
                }
                if ($adj >= 4) {
                    $seats[$i][$j] = 'L';
                    $changed = true;
                }
            }
        }
    }
}

$occ = 0;
foreach ($seats as $row) {
    foreach ($row as $seat) {
        if ($seat === '#') $occ++;
    }
}
echo "{$occ}\n";