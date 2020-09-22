<?php


/**
 * Мои заказы
 *
 * @var array $table Данные таблицы
 * @var string $type Имя контроллера
 * @var array $comments Комментарии к полям таблицы
 * @var array $totalPrice Конечная сумма
 * @var int $pageCount Количество страниц
 * @var int $currentPage текущая страница
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

//    unset($value['users_id']);
}
//unset($comments['users_id']);

echo TexLab\Html\Html::table()
    ->setData($table)
    ->setHeaders($comments)
    ->setClass('table table-striped table-secondary')
    ->removeColumns(['users_id'])
    ->loopByRow(function (&$row) use ($type) {

        if ($row['status'] != 'Оплачено' && $row['status'] != 'Отменён') {
            $row['edit'] = "<a role='button' href='?action=showedit&type=$type&id=$row[id]' class='btn btn-outline-primary'>Изменить заказ</a>" .
                "<br><a role='button' href='?action=canceledit&type=$type&id=$row[id]' class='btn btn-outline-danger'>Отменить заказ</a>";
        } else {
            $row['edit'] = "<a role='button' href='?action=showedit&type=$type&id=$row[id]' class='btn btn-outline-primary'>Изменить</a>" .
                "<br><a role='button' href='?action=canceledit&type=$type&id=$row[id]' class='btn btn-outline-danger'>Отменить</a>";
        }


    })
    ->html();
echo "<div class='alert alert-primary price__text' role='alert'>Вы сделали заказ на:</span> ";
echo "<span class='price'>" . $totalPrice . "руб.</span>";
echo "</div>";

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



