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

 echo Html::create('TableEdited')
     ->setControllerType($type)
     ->setHeaders($comments)
     ->data($table)
     ->setClass('table')
     ->html();
    // print_r($table);
?>
<!--<section class="products">-->
<!--    <div class="container">-->
        <?php
//        foreach ($table as &$value) {
//            $ext = pathinfo($value['imgdishes'], PATHINFO_EXTENSION);
//            $value['imgdishes'] = "<img src='images/dishes/$value[id].$ext' class='card-img-top' style='height:200px'>";
//        }
//
//        echo '<div class="row">';
//        foreach ($table as $row) {
//            echo '<div class="col-md-3 col-sm-6">';
//            echo '<div class="card">';
//            echo $row['imgdishes'];
//            echo '<div class="card-body">';
//            echo '<h5 class="card-title">Состав:</h5>';
//            echo '<p class="card-text"  style="height:100px">'.$row['composition'].'</p>';
//            echo '</div>';
//            echo '<ul class="list-group list-group-flush">';
//            echo '<li class="list-group-item"><b>'.$row['namedishes'].'</b></li>';
//            echo '</ul>';
//            echo '<div class="card-body">';
//            echo "<button type='button' class='btn btn-danger dropdown-toggle'" .
//                "data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Опции</button>\n" .
//                "<div class='dropdown-menu'>" .
//                "<a class='dropdown-item' href='?action=del&type=$type&id=$row[id]'>Удалить</a>" .
//                "<a class='dropdown-item' href='?action=showedit&type=$type&id=$row[id]'>Редактировать</a>" .
//                "</div>";
//            echo '</div>';
//            echo '</div>';
//            echo "</div>\n\n";
//            if ((($key + 1) % 4 == 0) && ($key != (count($table) -1))) {
//                echo "</div>\n\n\n\n\n\n";
//                echo '<div class="row">';
//            }
//        }
//        echo '</div>';
        ?>
<!---->
<!--    </div>-->
<!--</section>-->
<?php

echo "<div class='contPag'>";
echo Html::create("Pagination")
    ->setClass('pagination')
    ->setControllerType($type)
    ->setPageCount($pageCount)
    ->html();
echo "</div>";
?>

<a class="btn btn-light" id="addButton">Добавить блюдо</a>

<?php


$form = Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=add&type=$type")
    ->setClass('hidden')
    //    ->addClass('hidden', 'form')
    ->setId('addForm');

foreach ($fields as $field) {
    $form
        ->addContent(
            Html::create('Label')
                ->setClass('comment')
                ->setFor($field)
                ->setInnerText($comments[$field])
                ->html()
        );

    if ($field == 'imgdishes') {
        $form
            ->addContent(
                Html::create('input')
                    ->setName($field)
                    ->setId($field)
                    ->setType('file')
                    ->html()
            );
    } elseif ($field == 'composition') {
        $form
            ->addContent(
                Html::create('textarea')
                    ->setRow('70')
                    ->setColl('70')
                    ->setName($field)
                    ->setId($field)
                    ->html()
            );
    } else {
        $form
            ->addContent(
                Html::create('input')
                    ->setName($field)
                    ->setId($field)
                    ->html()
            );
    }
}

$form->addContent(
    Html::create('Input')
        ->setType('submit')
        ->setValue('Добавить')
        ->html()
)
    ->addContent(
        Html::create('A')
            ->setClass('btn btn-link')
            ->setId('closeFormButton')
            ->setInnerText('Закрыть')
            ->html()
    );

echo $form->html();


?>

<div id="shadow" class="hidden"></div>

<script>
    let fun = function() {

        let addButton = document.getElementById("addButton");
        addButton.innerText = addButton.innerText === "Закрыть окно" ? "Добавить блюдо" : "Закрыть окно"

        document.getElementById("addForm").classList.toggle("hidden")
        document.getElementById("shadow").classList.toggle("hidden")
    }

    document.getElementById("addButton").onclick = fun

    document.getElementById("closeFormButton").onclick = fun

    document.getElementById("shadow").onclick = fun
</script>