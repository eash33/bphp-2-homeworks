<?php
//exercise-03

$variable = null;

if (is_bool($variable)) {
    $type = 'bool';
} elseif (is_float($variable)) {
    $type = 'float';
} elseif (is_int($variable)) {
    $type = 'integer';
} elseif (is_string($variable)) {
    $type = 'string';
} elseif (is_null($variable)) {
    $type = 'null';
} else {
    $type = 'other';
}

echo "type is $type \n";



//exercise-03_extra

$variable = 3.14;

switch (true) {
    case is_bool(value: $variable):
        $type = 'bool';
        break;
    case is_float(value: $variable):
        $type = 'float';
        break;
    case is_int(value: $variable):
        $type = 'integer';
        break;
    case is_string(value: $variable):
        $type = 'string';
        break;
    case is_null(value: $variable):
        $type = 'null';
        break;
    default:
        $type = 'other';
}

echo "type is $type \n";