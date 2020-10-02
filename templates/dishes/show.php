<?php


use TexLab\Html\Select;

use View\Html\Html;


/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $table
 * @var int $currentPage
 */
?>
<h3>Работа с блюдами</h3>
<?php
foreach ($table as &$value) {
    $ext = pathinfo($value['imgdishes'], PATHINFO_EXTENSION);
    $value['imgdishes'] = "<img src='images/dishes/$value[id].$ext' class='img'>";

    if ($value['statusdish'] == 'Актуально') {
        $value['statusdish'] = "<div class='stat stat_5'>" . $value['statusdish'] . "</div>";
    } elseif ($value['statusdish'] == 'Не актуально') {
        $value['statusdish'] = "<div class='stat stat_6'>" . $value['statusdish'] . "</div>";
    }

    if ($value['namedishes']) {
        $value['namedishes'] = "<div class='stat'>" . $value['namedishes'] . "</div>";
    }

    if ($value['volume']) {
        $value['volume'] = "<div class='stat volume'>" . $value['volume'] . "</div>";
    }

    if ($value['unit']) {
        $value['unit'] = "<div class='stat volume'>" . $value['unit'] . "</div>";
    }

    if ($value['price']) {
        $value['price'] = "<div class='stat price'>" . $value['price'] . "</div>";
    }
}
// Вывод ошибок
if (!empty($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
        echo "<div class='alert alert-danger' role='alert'>$error</div>";
    }
    unset($_SESSION['errors']);
}

echo TexLab\Html\Html::table()
    ->setData($table)
    ->setHeaders($comments)
    ->setClass('table table-striped table-warning')
    ->loopByRow(function (&$row) use ($type) {
        $row['edit'] = "<button type='button' class='btn btn-danger dropdown-toggle'" .
            "data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Опции</button>\n" .
            "<div class='dropdown-menu'>" .
            "<a class='dropdown-item' href='?action=del&type=$type&id=$row[id]'>Удалить</a>" .
            "<a class='dropdown-item' href='?action=showedit&type=$type&id=$row[id]'>Редактировать</a>" .
            "</div>\n";
    })
    ->html();



?>

<a class="btn btn-light" id="addButton">Добавить блюдо</a>

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
// echo "<div class='contPag'>";
// echo Html::create("Pagination")
//     ->setClass('pagination')
//     ->setControllerType($type)
//     ->setPageCount($pageCount)
//     ->html();
// echo "</div>";

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