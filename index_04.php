<?php
$number1 = trim(fgets(STDIN));
$number2 = trim(fgets(STDIN));

$num1 = filter_var($number1, FILTER_VALIDATE_INT);
$num2 = filter_var($number2, FILTER_VALIDATE_INT);

if ($num1 === false || $num2 === false) {
    fwrite(STDERR,"Введите, пожалуйста, число".PHP_EOL);
    exit(1);
    } elseif ($num2 === 0) {
        fwrite(STDERR,"Делить на 0 нельзя".PHP_EOL);
        exit(1);
        } else {
        fwrite(STDOUT, ($num1/$num2).PHP_EOL);
        }