<?php
// exercise-02_1

echo __FILE__ . "\n";
echo __LINE__ . "\n";


// exercise-02_2
$name = "Петя";

$msg = <<<MSG
Привет, $name!
Сколько тебе лет?
MSG;

echo $msg . "\n";


// exercise-02_3
$a = "Рыба";
$b = "человек";

echo $a . " рыбою сыта, а " . $b . " человеком " . "\n";