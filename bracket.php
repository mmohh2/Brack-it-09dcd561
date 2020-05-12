<?php

$input = file_get_contents("input.txt");
$check = array("{","[","(");
$row_check = array();
function construct($input)
{
    $input = preg_split('/\n/', $input);
    
    for ($x = 0; $x < count($input); $x++) {
        $row[$x] = str_split($input[$x]);
        $row_check[$x] = false;
        for ($i = 0; $i < count($row[$x]); $i++) {
            posCheck($row, $x, $i, $row_check);
        }
        if ($row_check[$x] === true) {
            echo "$x yes" . PHP_EOL;
        } else {
            echo "$x no" . PHP_EOL;
        }
    }
}
function posCheck($row, $x, $i, &$row_check)
{
    $length = count($row[$x]) - 1;
    if ($i < ($length / 2)) {
        if ($row[$x][$i] === "{" && $row[$x][$length - $i] === "}") {
            $row_check[$x] = true;
        }
        if ($row[$x][$i] === "[" && $row[$x][$length - $i] === "]") {
            $row_check[$x] = true;
        }
        if ($row[$x][$i] === "(" && $row[$x][$length - $i] === ")") {
            $row_check[$x] = true;
        } else {
            $row_check[$x] = false;
        }
    }
}
construct($input);
