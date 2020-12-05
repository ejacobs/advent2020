<?php

$data = explode("\n", file_get_contents('4.txt'));

$counter = 0;
$fields = [];
foreach ($data as $i => $line) {
    if (trim($line) === '') {
        if (count($fields) === 8 || (count($fields) === 7 && !isset($fields['cid']))) $counter++;
        $fields = []; continue;
    }
    $tokens = explode(' ', $line);
    foreach ($tokens as $token) {
        $fieldParts = explode(':', $token);
        $fields[$fieldParts[0]] = $fieldParts[1];
    }
}

echo $counter . "\n";
