<?php

$data = explode("\n", file_get_contents('8.txt'));

for ($i = 0; $i < count($data); $i++) {
    $line = $data[$i];
    list($ins, $num) = explode(' ', $line);
    if ($ins === 'acc') continue;
    $check = $data;
    if ($ins === 'jmp') {
        $check[$i] = "nop {$num}";
    } else {
        $check[$i] = "jmp {$num}";
    }
    if (($acc = terminates($check)) !== -1) {
        echo $acc . "\n";
        die;
    }
}

function terminates($data): int {
    $acc = 0;
    $visited = [];
    for ($i = 0; $i < count($data); $i++) {
        $line = $data[$i];
        if (isset($visited[$i]) || !isset($data[$i])) {
            return -1;
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
    return $acc;
}
