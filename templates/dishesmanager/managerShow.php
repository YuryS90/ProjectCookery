<?php

use View\Html\Html;


/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $table
 */
foreach ($table as &$value) {
    $ext = pathinfo($value['imgdishes'], PATHINFO_EXTENSION);
    $value['imgdishes'] = "<img src='images/dishes/$value[id].$ext' class='img'>";
}

echo Html::create('TableToOrder')
    ->setControllerType($type)
    ->setHeaders($comments)
    ->data($table)
    ->setClass('table')
    ->html();

// Чтобы число первой страницы появлялось вместе со второй
if ($pageCount > 1) {
    echo "<div class='contPag'>";
    echo Html::create("Pagination")
        ->setClass('pagination')
        ->setControllerType($type)
        ->setPageCount($pageCount)
        ->html();
    echo "</div>";
}