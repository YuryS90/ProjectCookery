<?php

use TexLab\Html\Html as Htmlt;
use TexLab\Html\Select;
use View\Html\Html;


/**
 * @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $usersList Список пользователей
 * @var array $dishesList Список блюд
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
<a class="btn btn-dark" id="addButton">Добавить заказ</a>
<?php

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
