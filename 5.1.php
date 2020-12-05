<?php

$data = explode("\n", file_get_contents('5.txt'));

$highest = 0;
foreach ($data as $line) {
    $rowLetters = str_split(substr($line,0,7));
    $row = 0;
    foreach ($rowLetters as $i => $rowLetter) {
        if ($rowLetter === 'B') $row += pow(2,7-($i+1));
    }
    $colLetters = str_split(substr($line,7,3));
    $col = 0;
    foreach ($colLetters as $i => $colLetter) {
        if ($colLetter === 'R') $col += pow(2,3-($i+1));
    }
    $seatNum = ($row * 8) + $col;
    if ($seatNum > $highest) $highest = $seatNum;
}

echo "{$highest} \n";
