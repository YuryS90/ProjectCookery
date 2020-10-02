<?php

use TexLab\Html\Html as Htmlt;
use TexLab\Html\Select;
use View\Html\Html;

/**
 * @var int $pageCount Количество страниц
 * @var int $currentPage Текущая страница
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $usersList Список пользователей
 * @var array $dishesList Список блюд
 * @var array $groupNames Имя групп
 * @var array $table
 */

?>
<h3>Работа с заказами</h3>
<?php
foreach ($table as &$value) {

    if ($value['status'] == 'Ожидание' || $value['status'] == 'Изменён(Ожидание)') {
        $value['status'] = "<div class='stat stat_1'>" . $value['status'] . "</div>";
    } elseif ($value['status'] == 'Отменён') {
        $value['status'] = "<div class='stat stat_2'>" . $value['status'] . "</div>";
    } elseif ($value['status'] == 'Оплачено') {
        $value['status'] = "<div class='stat stat_3'>" . $value['status'] . "</div>";
    } elseif ($value['status'] == 'Готово') {
        $value['status'] = "<div class='stat stat_4'>" . $value['status'] . "</div>";
    }

    if ($value['date']) {
        $value['date'] = "<div class='stat'>" . $value['date'] . "</div>";
    }

    if ($value['count']) {
        $value['count'] = "<div class='stat'>" . $value['count'] . "</div>";
    }

    if ($value['dishes_id']) {
        $value['dishes_id'] = "<div class='stat'>" . $value['dishes_id'] . "</div>";
    }

    if ($value['users_id']) {
        $value['users_id'] = "<div class='stat'>" . $value['users_id'] . "</div>";
    }
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
            "</div></td>\n";
    })
    ->html();

?>
<a class="btn btn-dark" id="addButton">Добавить заказ</a>
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

//echo "<div class='contPag'>";
//echo Html::create("Pagination")
//    ->setClass('pagination')
//    ->setControllerType($type)
//    ->setPageCount($pageCount)
//    ->html();
//echo "</div>";



$form = Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=add&type=$type")
    ->setClass('hidden')
    ->setId('addForm');


foreach ($fields as $field) {
    /*
     * выбираем id того пользователя, от ФИО которого новый заказ. Где полученное значение будет подставлено
     * в поле users_id, которое озаглавлено как  ФИО
     * */
    if ($field == 'users_id') {
        $form
            ->addContent(Html::create('Label')->setInnerText($comments[$field])->setClass('comment')
                ->setFor($field)
                ->html());
        $form
            ->addContent((new Select())
                ->setName($field)
                ->setId($field)
                ->setData($usersList)
                ->html());
    } elseif ($field == 'date') {
        $form
            ->addContent(
                Htmlt::input()
                    ->setType('hidden')
                    ->setValue(date('Y-m-d H:i:s'))
                    ->setName($field)
                    ->setId($field)
                    ->html());
        //        $form->addContent(Html::create('input')->setName($field)->setId($field)->setType('datetime-local')->html());

    } elseif ($field == 'dishes_id') {
        $form
            ->addContent(Html::create('Label')->setInnerText($comments[$field])->setClass('comment')
                ->setFor($field)
                ->html());
        $form
            ->addContent((new Select())
                ->setName($field)
                ->setId($field)
                ->setData($dishesList)
                ->html());
    } elseif ($field == 'status') {
        $form
            ->addContent(Html::create('Label')->setInnerText($comments[$field])->setClass('comment')
                ->setFor($field)
                ->html());
        $form
            ->addContent((new Select())
                ->setName($field)
                ->setId($field)
                ->setData(
                    [
                        'Ожидание' => 'Ожидание'
                    ]
                )
                ->html());
    } elseif ($field == 'count') {
        $form
            ->addContent(Html::create('Label')->setInnerText($comments[$field])->setClass('comment')
                ->setFor($field)
                ->html());
        $form
            ->addContent(Html::create('input')
                ->setName($field)
                ->setType("number")
                ->setValue('0')
                ->setId($field)
                ->html());
    } else {
        $form->addContent(Html::create('input')->setName($field)->setId($field)->html());
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

//print_r($ordersList);
/*
 * print_r($usersList);
 * это показатель того, что пришёл массив с пользователями
 * Array ( [47] => Вася [46] => Игорь [30] => Юрий )
 * Затем есть заранее подготовленный класс с выпадающим списком
 * */

?>
<div id="shadow" class="hidden"></div>

<script>
    let fun = function () {

        let addButton = document.getElementById("addButton");
        addButton.innerText = addButton.innerText === "Закрыть окно" ? "Добавить заказ" : "Закрыть окно"

        document.getElementById("addForm").classList.toggle("hidden")
        document.getElementById("shadow").classList.toggle("hidden")
    }

    document.getElementById("addButton").onclick = fun

    document.getElementById("closeFormButton").onclick = fun

    document.getElementById("shadow").onclick = fun
</script>
