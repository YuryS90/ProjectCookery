<?php

use View\Html\Html;


/** @var int $pageCount Количество страниц
 * @var int $currentPage
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $table
 */
foreach ($table as &$value) {
    $ext = pathinfo($value['imgdishes'], PATHINFO_EXTENSION);
    $value['imgdishes'] = "<img src='images/dishes/$value[id].$ext' class='img'>";

    if ($value['statusdish'] == 'Актуально') {
        $value['statusdish'] = "<div class='stat stat_5'>" . $value['statusdish'] . "</div>";
    } elseif ($value['statusdish'] == 'Не актуально') {
        $value['statusdish'] = "<div class='stat stat_6'>" . $value['statusdish'] . "</div>";
    }

    if ($value['namedishes']) {
        $value['namedishes'] = "<div class='stat'>" . $value['namedishes'] . "</div>";
    }

    if ($value['volume']) {
        $value['volume'] = "<div class='stat volume'>" . $value['volume'] . "</div>";
    }

    if ($value['unit']) {
        $value['unit'] = "<div class='stat volume'>" . $value['unit'] . "</div>";
    }

    if ($value['price']) {
        $value['price'] = "<div class='stat price'>" . $value['price'] . "</div>";
    }
}

echo TexLab\Html\Html::table()
    ->setData($table)
    ->setHeaders($comments)
    ->setClass('table table-striped table-warning')
    ->removeColumns(['statusdish'])
    ->loopByRow(function (&$row) use ($type) {
        $row['edit'] = "<a role='button' href='?action=addorder&type=currentuserorders&id=$row[id]' class='btn btn-success'>" .
                "Заказать</a>\n";
    })
    ->html();

// Чтобы число первой страницы появлялось вместе со второй
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