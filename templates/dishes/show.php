<?php

use View\Html\Html;

/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
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

echo "<div class='contPag'>";
echo Html::create("Pagination")
    ->setClass('pagination')
    ->setControllerType($type)
    ->setPageCount($pageCount)
    ->html();
echo "</div>";
?>

<a class="btn btn-light" id="addButton">Добавить заявку</a>

<?php


$form = Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=add&type=$type")
    ->setClass('hidden')
    ->setId('addForm');

foreach ($fields as $field) {
    if ($field == 'imgdishes') {
        $form->addContent(Html::create('Label')->setFor($field)->setInnerText($comments[$field])->html());
        $form->addContent(Html::create('input')->setName($field)->setId($field)->setType('file')->html());
    } else {
        $form->addContent(Html::create('Label')->setFor($field)->setInnerText($comments[$field])->html());
        $form->addContent(Html::create('input')->setName($field)->setId($field)->html());
    }
}

$form->addContent(
    Html::create('Input')
        ->setType('submit')
        ->setValue('OK')
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
