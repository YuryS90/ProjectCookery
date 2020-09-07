<?php

use TexLab\Html\Select;
use View\Html\Html;

/**
 * Пользователи
 *
 * @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $groupNames Имя групп
 * @var array $table
 */

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
<a class="btn btn-outline-success" id="addButton">Добавить пользователя</a>
<?php

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
                ->setInnerText($comments[$field])
                ->setClass('comment')
                ->html()
        );

    if ($field != 'group_id') {
        $form
            ->addContent(
                Html::create('input')
                    ->setName($field)
                    ->setId($field)
                    ->html()
            );
    } else {
        $form
            ->addContent(
                (new Select())
                    ->setName($field)
                    ->setId($field)
                    ->setData($groupNames)
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
        addButton.innerText = addButton.innerText === "Закрыть окно" ? "Добавить пользователя" : "Закрыть окно"

        document.getElementById("addForm").classList.toggle("hidden")
        document.getElementById("shadow").classList.toggle("hidden")
    }

    document.getElementById("addButton").onclick = fun

    document.getElementById("closeFormButton").onclick = fun

    document.getElementById("shadow").onclick = fun
</script>
