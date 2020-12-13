<?php

$data = explode("\n", file_get_contents('11.txt'));
$w = strlen($data[0]);
$h = count($data);

$dirs = [
    [-1,-1], [0,-1], [1,-1],
    [-1, 0],         [1, 0],
    [-1, 1], [0, 1], [1, 1],
];

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
                foreach ($dirs as $d => $dir) {
                    $cj = $j ;
                    $ci = $i ;
                    while (1) {
                        $ci += $dir[0];
                        $cj += $dir[1];
                        if ($ci >= $h || $ci < 0) continue(2);
                        else if ($cj >= $w || $cj < 0) continue(2);
                        else if ($tmp[$ci][$cj] === 'L') continue(2);
                        else if ($tmp[$ci][$cj] === '#') continue(3);
                    }
                }
                $seats[$i][$j] = '#';
                $changed = true;
            } else if ($col === '#') {
                $adj = 0;
                foreach ($dirs as $d => $dir) {
                    $cj = $j ;
                    $ci = $i ;
                    while (1) {
                        $ci += $dir[0];
                        $cj += $dir[1];
                        if ($ci >= $h || $ci < 0) continue(2);
                        else if ($cj >= $w || $cj < 0) continue(2);
                        else if ($tmp[$ci][$cj] === 'L') continue(2);
                        else if ($tmp[$ci][$cj] === '#') {
                            $adj++;
                            continue(2);
                        }
                    }
                }

                if ($adj >= 5) {
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
        if ($seat === '#') {
            $occ++;
        }
    }
}
echo "\n{$occ}\n";