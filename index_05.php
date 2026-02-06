<?php
mb_internal_encoding('UTF-8');
mb_regex_encoding('UTF-8');

echo "Введите Ваше имя: ";
$name = trim(readline()); // Ждёт пока пользователь введёт имя и нажмёт Enter

echo "Введите Вашу фамилию: ";
$surname = trim(readline()); // Ждёт пока пользователь введёт имя и нажмёт Enter

echo "Введите Ваше отчество: ";
$patronymic = trim(readline()); // Ждёт пока пользователь введёт имя и нажмёт Enter


$fullName = $surname . " " . $name . " " . $patronymic;
$fullName = mb_convert_case($fullName, MB_CASE_TITLE, "UTF-8");
echo "Полное имя: $fullName".PHP_EOL;


if (preg_match('/^(\p{L}+)\s+(\p{L}+)\s+(\p{L}+)$/u', $fullName, $matches)) {
    $surnameAndInitials = mb_ucfirst($matches[1], 'UTF-8');
    $initials = mb_strtoupper(mb_substr($matches[2], 0, 1, 'UTF-8'), 'UTF-8') . '.' .
                mb_strtoupper(mb_substr($matches[3], 0, 1, 'UTF-8'), 'UTF-8') . '.';
    $fio = mb_strtoupper(mb_substr($matches[1], 0, 1, 'UTF-8'), 'UTF-8') .
            mb_strtoupper(mb_substr($matches[2], 0, 1, 'UTF-8'), 'UTF-8') .
            mb_strtoupper(mb_substr($matches[3], 0, 1, 'UTF-8'), 'UTF-8');

    echo "Фамилия и инициалы: {$surnameAndInitials} {$initials}" . PHP_EOL;
    echo "Аббревиатура: {$fio}" . PHP_EOL;
} else {
    echo "Не удалось распознать ФИО. Убедитесь, что корректно заполнили поля (Фамилия Имя Отчество)." . PHP_EOL;
};