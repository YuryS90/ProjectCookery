<?php

use View\Html\Html;

/**
 * Группы
 *
 * @var array $table Данные таблицы
 * @var string $type Имя контроллера
 * @var array $comments Комментарии к полям таблицы
 * @var int $pageCount Количество страниц
 * @var int $currentPage текущая страница
 * @var array $fields Список полей таблицы
 */
?>
<h3>Управление группами</h3>
<?php
echo TexLab\Html\Html::table()
    ->setData($table)
    ->setHeaders($comments)
    ->setClass('table table-striped table-success')
    ->removeColumns(['users_id'])
    ->loopByRow(function (&$row) use ($type) {
        $row['edit'] = "<button type='button' class='btn btn-danger dropdown-toggle'" .
            "data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Опции</button>\n" .
            "<div class='dropdown-menu'>" .
            "<a class='dropdown-item' href='?action=del&type=$type&id=$row[id]'>Удалить</a>" .
            "<a class='dropdown-item' href='?action=showedit&type=$type&id=$row[id]'>Редактировать</a>" .
            "</div></td>\n";
    })
    ->html();

?>

<a class="btn btn-outline-success" id="addButton">Добавить новую группу</a>

<?php

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


$form = Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=add&type=$type")
    ->setClass('hidden')
    ->setId('addForm');


foreach ($fields as $field) {
    $form
        ->addContent(
            Html::create('Label')
                ->setFor($field)
                ->setClass('comment')
                ->setInnerText($comments[$field])
                ->html()
        );
    $form
        ->addContent(
            Html::create('input')
                ->setName($field)
                ->setId($field)
                ->html()
        );
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
        addButton.innerText = addButton.innerText === "Закрыть окно" ? "Добавить группу" : "Закрыть окно"

        document.getElementById("addForm").classList.toggle("hidden")
        document.getElementById("shadow").classList.toggle("hidden")
    }

    document.getElementById("addButton").onclick = fun

    document.getElementById("closeFormButton").onclick = fun

    document.getElementById("shadow").onclick = fun
</script>
