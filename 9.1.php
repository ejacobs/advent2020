<?php

$data = explode("\n", file_get_contents('9.txt'));

$add = [];
for ($i=0; $i<count($data); $i++) {
    $add[] = $data[$i];
    if (count($add) > 25) array_shift($add);
    if ($i >= 24) {
        $val = $data[$i+1];
        foreach ($add as $addpart) {
            if (in_array($val - $addpart, $add) && ($addpart != $val - $addpart)) {
                continue(2);
            }
        }
        echo $val . "\n"; die;
    }
}
