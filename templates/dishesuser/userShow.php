<?php


/** @var int $pageCount Количество страниц
 * @var int $currentPage Текущая страница
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $table
 */
//foreach ($table as &$value) {
//    $ext = pathinfo($value['imgdishes'], PATHINFO_EXTENSION);
//    $value['imgdishes'] = "<img src='images/dishes/$value[id].$ext' class='img'>";
//}

//echo Html::create('TableToOrder')
//    ->setControllerType($type)
//    ->setHeaders($comments)
//    ->data($table)
//    ->setClass('table')
//    ->html();
?>
<section class="products">
    <div class="container">
        <?php
        foreach ($table as &$value) {
            $ext = pathinfo($value['imgdishes'], PATHINFO_EXTENSION);
            $value['imgdishes'] = "<img src='images/dishes/$value[id].$ext' class='card-img-top' style='height:200px'>";
        }

        echo "<div class='row'>\n";
        foreach ($table as $row) {
            echo "<div class='col-md-4 col-sm-6'>\n";
            echo "<div class='card'>\n";
            echo "$row[imgdishes]\n";
            echo "<div class='card-body'>\n";
            echo "<h5 class='card-title'>Состав:</h5>\n";
            echo "<p class='card-text' style='height:100px'>" . "$row[composition]</p>\n";
            echo "</div>\n";
            echo "<ul class='list-group list-group-flush'>\n";
            echo "<li class='list-group-item'><b>" . "$row[namedishes]</b></li>\n";
            echo "<li class='list-group-item'><b>" . "$row[volume] $row[unit]</b></li>\n";
            echo "<li class='list-group-item'><b>" . "$row[price]руб</b></li>\n";
            echo "</ul>\n";
            echo "<div class='card-body'>\n";
            echo "<a role='button' href='?action=addorder&type=currentuserorders&id=$row[id]' class='btn btn-success'>" .
                "Заказать</a>\n";
            echo "</div>\n";
            echo "</div>\n";
            echo "</div>\n";
        }
        echo "</div>\n";
        ?>

    </div>
</section>
<?php
// Чтобы число первой страницы появлялось вместе со второй
//if ($pageCount > 1) {
//    echo "<div class='contPag'>";
//    echo Html::create("Pagination")
//        ->setClass('pagination')
//        ->setControllerType($type)
//        ->setPageCount($pageCount)
//        ->html();
//    echo "</div>";
//}
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