<?php

use TexLab\Html\Html as Htmlt;
use TexLab\Html\Select;
use View\Html\Html;

/**
 * Просмотр заказов всех менеджеров
 *
 * @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $usersList Список пользователей
 * @var array $dishesList Список блюд
 * @var array $groupNames Имя групп
 * @var array $table данные таблицы
 */
foreach ($table as &$value) {
    
    if ($value['status'] == 'Ожидание') {
        $value['status'] = "<font color='blue'>" . $value['status'] . "</font>";
    } elseif ($value['status'] == 'Изменён(Ожидание)') {
        $value['status'] = "<font color='green'>" . $value['status'] . "</font>";
    } elseif ($value['status'] == 'Отменён') {
        $value['status'] = "<font color='red'>" . $value['status'] . "</font>";
    }
}
echo Html::create('Table')
    ->setHeaders($comments)
    ->data($table)
    ->setClass('table')
    ->html();

echo "<div class='contPag'>";
echo Html::create("Pagination")
    ->setClass('pagination')
    ->setControllerType($type)
    ->setPageCount($pageCount)
    ->html();
echo "</div>";





