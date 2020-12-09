<?php

$data = explode("\n", file_get_contents('9.txt'));

for ($i = 0; $i<count($data); $i++) {
    $sum = 0;
    for ($b=$i-1; $b >= 0 && $sum < 69316178; $b--) {
        $sum += $data[$b];
        if ($sum === 69316178) {
            $slice = array_slice($data, $b, $i-$b);
            $ans = min($slice) + max($slice);
            echo $ans; die;
        }
    }
}