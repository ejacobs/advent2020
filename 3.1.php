<?php

$data    = explode("\n", file_get_contents('3.txt'));
$counter = 0;
foreach ($data as $i => $line) {
    if ($i === 0) continue;
    $tree = $line[($i*3) % strlen($line)];
    if ($tree === '#') $counter++;
}
echo "{$counter}\n";
