<?php

$data = array_flip(explode("\n", file_get_contents('1.txt')));
ksort($data);
foreach ($data as $val1 => $i1) {
    foreach ($data as $val2 => $i2) {
        if (isset($data[2020 - $val1 - $val2])) {
            $ans = (2020 - $val1 - $val2) * $val1 * $val2;
            echo "{$ans}\n";
            break(2);
        }
    }
}
