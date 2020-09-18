<?php

use TexLab\Html\Select;
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

    if ($value['statusdish'] == 'Актуально') {
        $value['statusdish'] = "<font color='green'>" . $value['statusdish'] . "</font>";
    } elseif ($value['statusdish'] == 'Не актуально') {
        $value['statusdish'] = "<font color='red'>" . $value['statusdish'] . "</font>";
    } 
}

echo Html::create('TableEdited')
    ->setControllerType($type)
    ->setHeaders($comments)
    ->data($table)
    ->setClass('table')
    ->html();
// print_r($table);


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
    } elseif ($field == 'statusdish') {
        $form
            ->addContent((new Select())
                ->setName($field)
                ->setId($field)
                ->setData(
                    [
                        'Актуально' => 'Актуально',
                        'Не актуально' => 'Не актуально'
                    ]
                )
                ->html());

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