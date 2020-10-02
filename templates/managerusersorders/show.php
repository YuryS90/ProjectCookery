<?php

use TexLab\Html\Html as Htmlt;
use TexLab\Html\Select;
use View\Html\Html;

/**
 * Просмотр заказов всех менеджеров
 *
 * @var int $pageCount Количество страниц
 * @var int $currentPage Текущая страница
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $usersList Список пользователей
 * @var array $dishesList Список блюд
 * @var array $groupNames Имя групп
 * @var array $table данные таблицы
 */
foreach ($table as &$value) {

    if ($value['status'] == 'Ожидание' || $value['status'] == 'Изменён(Ожидание)') {
        $value['status'] = "<div class='stat stat_1'>" . $value['status'] . "</div>";
    } elseif ($value['status'] == 'Отменён') {
        $value['status'] = "<div class='stat stat_2'>" . $value['status'] . "</div>";
    } elseif ($value['status'] == 'Оплачено') {
        $value['status'] = "<div class='stat stat_3'>" . $value['status'] . "</div>";
    } elseif ($value['status'] == 'Готово') {
        $value['status'] = "<div class='stat stat_4'>" . $value['status'] . "</div>";
    }

    if ($value['date']) {
        $value['date'] = "<div class='stat'>" . $value['date'] . "</div>";
    }

    if ($value['count']) {
        $value['count'] = "<div class='stat'>" . $value['count'] . "</div>";
    }

    if ($value['dishes_id']) {
        $value['dishes_id'] = "<div class='stat'>" . $value['dishes_id'] . "</div>";
    }

    if ($value['users_id']) {
        $value['users_id'] = "<div class='stat'>" . $value['users_id'] . "</div>";
    }
}

echo TexLab\Html\Html::table()
    ->setData($table)
    ->setHeaders($comments)
    ->setClass('table table-striped table-warning')
    ->html();

if ($pageCount > 1) {
    echo "<div class='contPag'>";
    echo TexLab\Html\Html::pagination()
        ->setPageCount($pageCount)
        ->setCurrentPage($currentPage)
        ->setClass('pagination')
        ->setUrlPrefix("?action=show&type=$type")
        ->setPrevious('&laquo;')
        ->setNext('&raquo;')
        ->html();
    echo "</div>";
}
//echo "<div class='contPag'>";
//echo Html::create("Pagination")
//    ->setClass('pagination')
//    ->setControllerType($type)
//    ->setPageCount($pageCount)
//    ->html();
//echo "</div>";






