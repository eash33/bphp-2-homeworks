<?php

declare(strict_types=1);

const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_DELETE = 2;
const OPERATION_PRINT = 3;

$operations = [
    OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
    OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
    OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
    OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
];

$items = [];

function getOperationNumber(array $operations): int
{
    echo implode(PHP_EOL, $operations) . PHP_EOL . '>';
    do {
        $result = (int) trim(fgets(STDIN));

        if (!array_key_exists($result, $operations)) {
            echo '!!! Неизвестный номер операции, повторите попытку.' . PHP_EOL;
        }
    } while (!array_key_exists($result, $operations));

    return $result;
}

function addProduct(array &$items): void
{
    echo "Введение названия товара для добавления в список: \n> ";
    $itemName = trim(fgets(STDIN));
    $items[] = $itemName;
}

function deleteProduct(array &$items): void
{
    shoppingList($items, false);
    if (empty($items)) {
        echo 'Список покупок пуст, нечего удалять.' . PHP_EOL;
        return;
    }

    echo 'Введение названия товара для удаления из списка:' . PHP_EOL . '> ';
    $itemName = trim(fgets(STDIN));

    if (in_array($itemName, $items, true) !== false) {
        while (($key = array_search($itemName, $items, true)) !== false) {
            unset($items[$key]);
        }
    } else {
        echo 'Товар не найден в списке. Выберите нужную операцию из списка и повторите ввод.' . PHP_EOL;
    }
}

function shoppingList(array $list, bool $isPrint): void
{
    $counter = count($list);
    if ($counter) {
        echo 'Ваш список покупок: ' . PHP_EOL;
        echo implode("\n", $list) . "\n";
    } else {
        echo 'Ваш список покупок пуст.' . PHP_EOL;
    }
    echo "\n ----- \n";
    if ($isPrint) {
        echo 'Всего ' . count($list) . ' позиций. ' . PHP_EOL;
        echo 'Нажмите enter для продолжения';
        trim(fgets(STDIN));
    }
}

do {
    $operationNumber = getOperationNumber($operations);

    echo 'Выбрана операция: '  . $operations[$operationNumber] . PHP_EOL;

    switch ($operationNumber) {
        case OPERATION_ADD:
            addProduct($items);
            break;

        case OPERATION_DELETE:
            deleteProduct($items);
            break;

        case OPERATION_PRINT:
            shoppingList($items, true);
            break;
    }

    echo "\n ----- \n";
} while ($operationNumber > 0);

echo 'Программа завершена' . PHP_EOL;