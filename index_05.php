<?php
mb_internal_encoding('UTF-8');
mb_regex_encoding('UTF-8');

echo "Введите Ваше имя: ";
$name = trim(readline()); 

echo "Введите Вашу фамилию: ";
$surname = trim(readline());

echo "Введите Ваше отчество: ";
$patronymic = trim(readline()); 

$fullName = $surname . " " . $name . " " . $patronymic;
$fullName = mb_convert_case($fullName, MB_CASE_TITLE, "UTF-8");
echo "Полное имя: $fullName".PHP_EOL;

$initial = mb_strtoupper(mb_substr($name,0,1,"UTF-8"),"UTF-8").".".
mb_strtoupper(mb_substr($patronymic,0,1,"UTF-8"),"UTF-8").".";

$surname = mb_convert_case($surname, MB_CASE_TITLE, "UTF-8");
$surnameAndInitials = $surname." ". $initial;
echo "Фамилия и инициалы: $surnameAndInitials".PHP_EOL;

$fio = mb_strtoupper(mb_substr($surname,0,1,"UTF-8"),"UTF-8"). 
mb_strtoupper(mb_substr($name,0,1,"UTF-8"),"UTF-8").
mb_strtoupper(mb_substr($patronymic,0,1,"UTF-8"),"UTF-8");
echo "Аббревиатура: $fio".PHP_EOL;
