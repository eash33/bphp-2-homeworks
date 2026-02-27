<?php

declare(strict_types=1);

date_default_timezone_set('UTC');

$month = (int) date('m');
$year = (int) date('Y');


function printEmployeeSchedule(int $year, int $month): void
{
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    $firstDayOfMonth = DateTime::createFromFormat('Y-n-j', "$year-$month-1");
    echo "Название месяца: " . $firstDayOfMonth->format('F') . PHP_EOL;
    echo "Количество дней в месяце: " . $daysInMonth . PHP_EOL;
    echo "Расписание выхода на работу: (\"+\" — рабочий день)" . PHP_EOL;

    $workSchedule = [];

    $currentDay = 1;
    
    while ($currentDay <= $daysInMonth) {
        $nextWorkingDay = $currentDay;

        $timestamp = mktime(12, 0, 0, $month, $nextWorkingDay, $year);
        $weekDay = (int) date('N', $timestamp); // 1–7 (Пн–Вс)

        // Переносы
        if ($weekDay === 6) {
            $nextWorkingDay += 2; 
        } elseif ($weekDay === 7) {
            $nextWorkingDay += 1;
        }

        if ($nextWorkingDay > $daysInMonth) {
            break;
        }

        $dateKey = date('Y-m-d', mktime(12, 0, 0, $month, $nextWorkingDay, $year));
        $workSchedule[$dateKey] = 'work';

        $currentDay = $nextWorkingDay + 3;
    }

    for ($day = 1; $day <= $daysInMonth; $day++) {
        $timestamp = mktime(12, 0, 0, $month, $day, $year);
        $dateStr = date('Y-m-d', $timestamp);
        $weekDayName = date('D', $timestamp);

        $isWork = isset($workSchedule[$dateStr]) && $workSchedule[$dateStr] === 'work';
        $marker = $isWork ? '+' : ' ';

        echo "$dateStr $weekDayName $marker" . PHP_EOL;
    }
}

printEmployeeSchedule($year, $month);