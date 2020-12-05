<?php

$data = explode("\n", file_get_contents('4.txt'));

$counter = 0;
$fields  = [];
foreach ($data as $i => $line) {
    if (trim($line) === '') {
        if (isset($fields['byr']) && ($fields['byr'] < 1920 || $fields['byr'] > 2002 || strlen($fields['byr']) !== 4)) unset($fields['byr']);
        if (isset($fields['iyr']) && ($fields['iyr'] < 2010 || $fields['iyr'] > 2020 || strlen($fields['iyr']) !== 4)) unset($fields['iyr']);
        if (isset($fields['eyr']) && ($fields['eyr'] < 2020 || $fields['eyr'] > 2030 || strlen($fields['eyr']) !== 4)) unset($fields['eyr']);
        if (isset($fields['hgt'])) {
            $unit = substr($fields['hgt'], -2);
            $val = substr($fields['hgt'], 0, strlen($fields['hgt'])-2);

            if (!is_numeric($val)) {
                unset($fields['hgt']);
            } elseif ($unit === 'cm') {
                if ($val < 150 || $val > 193) unset($fields['hgt']);
            } elseif ($unit === 'in') {
                if ($val < 59 || $val > 76) unset($fields['hgt']);
            }  else {
                unset($fields['hgt']);
            }
        }
        if (isset($fields['hcl'])) {
            $prefix = substr($fields['hcl'], 0, 1);
            $val = substr($fields['hcl'], 1);
            if (($prefix !== '#') || (!preg_match('/^[0-9a-f]{6}$/', $val))) unset($fields['hcl']);

        }
        if (isset($fields['ecl'])) {
            if (!in_array($fields['ecl'], ['amb','blu','brn','gry','grn','hzl','oth'])) unset($fields['ecl']);
        }
        if (isset($fields['pid'])) {
            if (!preg_match('/^[0-9]{9}$/', $fields['pid'])) unset($fields['pid']);
        }

        if (count($fields) === 8 || (count($fields) === 7 && ! isset($fields['cid']))) {
            $counter++;
        }
        $fields = [];
        continue;
    }
    $tokens = explode(' ', $line);
    foreach ($tokens as $token) {
        $fieldParts             = explode(':', $token);
        if (in_array($fieldParts[0], ['byr','iyr','eyr','hgt','hcl','ecl','pid','cid']))  $fields[$fieldParts[0]] = $fieldParts[1];
    }
}

echo $counter . "\n";
