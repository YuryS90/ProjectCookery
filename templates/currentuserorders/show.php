<?php

use View\Html\Html;


/**
 * Мои заказы с кнопкой "отменить заказ"
 *
 * @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $usersList Список пользователей
 * @var array $dishesList Список блюд
 * @var array $totalPrice
 * @var array $groupNames Имя групп
 * @var array $table
 * @var int $user_id
 * @var int $currentPage текущая страница
 */
foreach ($table as &$value) {
    
    if ($value['status'] == 'Ожидание') {
        $value['status'] = "<font color='blue'>" . $value['status'] . "</font>";
    } elseif ($value['status'] == 'Изменён(Ожидание)') {
        $value['status'] = "<font color='green'>" . $value['status'] . "</font>";
    } elseif ($value['status'] == 'Отменён') {
        $value['status'] = "<font color='red'>" . $value['status'] . "</font>";
    }

    unset($value['users_id']);
}
unset($comments['users_id']);

echo Html::create('TableCancel')
    ->setControllerType($type)
    ->setHeaders($comments)
    ->data($table)
    ->setClass('table')
    ->html();

echo "<div class='alert alert-primary price__text' role='alert'>Вы сделали заказ на:</span> ";
echo "<span class='price'>" . $totalPrice . "руб.</span>";
echo "</div>";


echo "<div class='contPag'>";
?>

<!--    <div class="pagination">-->
<!--        <a href="#">Предыдущая</a>-->
<!--    </div>-->

<?php
echo TexLab\Html\Html::pagination()
    ->setPageCount($pageCount)
    ->setCurrentPage($currentPage)
    ->setClass('pagination')
    ->setUrlPrefix("?action=show&type=$type")
    ->html();
//echo Html::create("Pagination")
//    ->setClass('pagination')
//    ->setControllerType($type)
//    ->setPageCount($pageCount)
//    ->html();
?>
<!--    <div class="pagination">-->
<!--        <a href="#">Следующая</a>-->
<!--    </div>-->
<?php
echo "</div>";



