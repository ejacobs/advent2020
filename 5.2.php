<?php

$data = explode("\n", file_get_contents('5.txt'));

$lowestRow = 127;
$highestRow = 0;

$seated = [];
foreach ($data as $line) {
    $rowLetters = str_split(substr($line,0,7));
    $row = 0;
    foreach ($rowLetters as $i => $rowLetter) {
        if ($rowLetter === 'B') $row += pow(2,7-($i+1));
    }
    if ($row < $lowestRow) $lowestRow = $row;
    if ($row > $highestRow) $highestRow = $row;

    $colLetters = str_split(substr($line,7,3));
    $col = 0;
    foreach ($colLetters as $i => $colLetter) {
        if ($colLetter === 'R') $col += pow(2,3-($i+1));
    }
    if (!isset($seated[$row])) $seated[$row] = [];
    $seated[$row][$col] = true;
}

foreach ($seated as $x => $seatedRow) {
    for ($i=0; $i<8; $i++) {
        if ($x == $lowestRow || $x == $highestRow) continue;
        if (!isset($seatedRow[$i])) {
            $seatNum = ($x * 8) + $i;
            echo "{$seatNum}\n"; break(2);
        }
    }
}
