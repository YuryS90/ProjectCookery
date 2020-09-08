<?php

use View\Html\Html;


/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $table
 */

foreach ($table as &$row) {
    $ext = pathinfo($row['imgdishes'], PATHINFO_EXTENSION);
    $row['imgdishes'] = "<img src='images/dishes/$row[id].$ext' class='img'>";
}

echo Html::create('TableEdited')
    ->setControllerType($type)
    ->setHeaders($comments)
    ->data($table)
    ->setClass('table')
    ->html();

    
// echo "<div class='col-md-3 col-sm-6'>";
// echo "<div class='card'>";
// echo "<img src='../../public/images/card/bliny.jpg' class='card-img-top'>";
// echo "<div class='card-body'>";
// echo "<h5 class='card-title'>" . "Состав:";
// echo "</h5>";
// echo "<p class='card-text'>" . "Компонент 1, компонент 2, компонент 3, компонент 4, компонент 5, компонент
//                6, компонент 7, компонент 8";
// echo "</p>";
// echo "</div>";
// echo "<ul class='list-group list-group-flush'>";
// echo "<li class='list-group-item'>" . "<b>" . "Блюдо 1" . "</b>" . "</li>";
// echo "<li class='list-group-item text-danger'>" . "3 руб" . "</li>";
// echo "</ul>";
// echo "<div class='card-body'>";
// echo Html::create("A")
//    ->setHref('#')
//    ->setClass('btn btn-primary buy')
//    ->setInnerText('Заказать')
//    ->html();
// echo "</div>";
// echo "</div>";
// echo "</div>";


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
    let fun = function () {

        let addButton = document.getElementById("addButton");
        addButton.innerText = addButton.innerText === "Закрыть окно" ? "Добавить блюдо" : "Закрыть окно"

        document.getElementById("addForm").classList.toggle("hidden")
        document.getElementById("shadow").classList.toggle("hidden")
    }

    document.getElementById("addButton").onclick = fun

    document.getElementById("closeFormButton").onclick = fun

    document.getElementById("shadow").onclick = fun
</script>
