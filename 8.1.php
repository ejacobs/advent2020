<?php

$data = explode("\n", file_get_contents('8.txt'));

$acc = 0;
$visited = [];
for ($i = 0; $i < count($data); $i++) {
    $line = $data[$i];
    if (isset($visited[$i])) {
        echo $acc . "\n";
        die;
    }
    list($ins, $num) = explode(' ', $line);
    $visited[$i] = true;
    switch ($ins) {
        case 'acc':
            $acc += $num;
            break;
        case 'jmp':
            $i += $num-1;
            break;
        case 'nop':
            break;
    }
}
