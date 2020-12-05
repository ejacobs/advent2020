<?php

$data = explode("\n", file_get_contents('3.txt'));

$ans = 1;
$ans *= check($data, 1, 1);
$ans *= check($data, 3, 1);
$ans *= check($data, 5, 1);
$ans *= check($data, 7, 1);
$ans *= check($data, 1, 2);
echo $ans . "\n";

function check($data, $right, $down)
{
    $counter = 0;
    for ($i = $down; $i < count($data); $i += $down) {
        $line = $data[$i];
        $tree = $line[(($i / $down) * $right) % strlen($line)];
        if ($tree === '#') $counter++;
    }
    return $counter;
}