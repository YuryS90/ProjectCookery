<?php


/** @var int $pageCount Количество страниц
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
//                print_r($row);
                echo "\t\t\t\t<div class='col-md-4 col-sm-6'>\n";
                echo "\t\t\t\t\t<div class='card'>\n";
                echo "\t\t\t\t\t\t$row[imgdishes]\n";
                echo "\t\t\t\t\t\t<div class='card-body'>\n";
                echo "\t\t\t\t\t\t\t<h5 class='card-title'>Состав:</h5>\n";
                echo "\t\t\t\t\t\t\t<p class='card-text' style='height:100px'>" . "$row[composition]</p>\n";
                echo "\t\t\t\t\t\t</div>\n";
                echo "\t\t\t\t\t\t<ul class='list-group list-group-flush'>\n";
                echo "\t\t\t\t\t\t\t<li class='list-group-item'><b>" . "$row[namedishes]</b></li>\n";
                echo "\t\t\t\t\t\t\t<li class='list-group-item'><b>" . "$row[volume] $row[unit]</b></li>\n";
                echo "\t\t\t\t\t\t\t<li class='list-group-item'><b>" . "$row[price]руб</b></li>\n";
                echo "\t\t\t\t\t\t</ul>\n";
                echo "\t\t\t\t\t\t<div class='card-body'>\n";
                echo "\t\t\t\t\t\t\t<a role='button' href='?action=addorder&type=currentuserorders&id=$row[id]' class='btn btn-success'>" .
                "Заказать</a>\n";
                echo "\t\t\t\t\t\t</div>\n";
                echo "\t\t\t\t\t</div>\n";
                echo "\t\t\t\t</div>\n";
//                if (($row) + 1 % 4 == 0) {
                echo "\t\t\t</div>\n\n\n";
                echo "\t\t\t<div class='row'>\n";
            }
            echo "\t\t\t</div>\n";
            ?>

        </div>
    </section>
<?php
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