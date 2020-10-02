<?php

use TexLab\Html\Select;
use View\Html\Html;

/**
 * Пользователи
 *
 * @var array $table Данные таблицы
 * @var string $type Имя контроллера
 * @var array $comments Комментарии к полям таблицы
 * @var int $pageCount Количество страниц
 * @var int $currentPage текущая страница
 * @var array $fields Список полей таблицы
 * @var array $groupNames Список имён групп
 */
?>
<h3>Управление пользователями</h3>
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

<a class="btn btn-outline-success" id="addButton">Добавить пользователя</a>

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
<!--Модальное окно или popup-->
<div id="popup" class="popup">

    <div class="popup__body">
        <div class="popup__content">
            <a href="#header" class="popup__close close-popup">X</a>
            <div class="popup__title">Modal window</div>
            <div class="popup__text">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque harum quisquam saepe. Delectus
                dolores ducimus ex nam nobis qui tenetur? At distinctio eos ex id, ipsum nisi recusandae sunt
                voluptatum.
            </div>
        </div>
    </div>
</div>

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
