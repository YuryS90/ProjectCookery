<?php

use TexLab\Html\Select;
use View\Html\Html;
use TexLab\Html\Html as Htmlt;

/**
 * @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $usersList Список пользователей
 * @var array $dishesList Список блюд
 * @var array $groupNames Имя групп
 */

echo Html::create("Pagination")
    ->setClass('pagination')
    ->setControllerType($type)
    ->setPageCount($pageCount)
    ->html();

echo Html::create('TableEdited')
    ->setControllerType($type)
    ->setHeaders($comments)
    ->data($table)
    ->setClass('table')
    ->html();


$form = Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=add&type=$type")
    ->setClass('form');


//foreach ($fields as $field) {
//    $form->addContent(Html::create('Label')->setFor($field)->setInnerText($comments[$field])->html());
//    $form->addContent(Html::create('input')->setName($field)->setId($field)->html());
//}

//print_r($fields);
foreach ($fields as $field) {
    $form->addContent(Html::create('Label')->setFor($field)->setInnerText($comments[$field])->html());

    /*
     * выбираем id того пользователя, от ФИО которого новый заказ. Где полученное значение будет подставлено
     * в поле users_id, которое озаглавлено как  ФИО
     * */
    if ($field == 'users_id') {

        $form->addContent((new Select())->setName($field)->setId($field)->setData($usersList)->html());
    } elseif ($field == 'date') {
        $form->addContent(Htmlt::input()->setType('datetime-local')->setName($field)->setId($field)->html());
        //        $form->addContent(Html::create('input')->setName($field)->setId($field)->setType('datetime-local')->html());

    } elseif ($field == 'dishes_id') {

        $form->addContent((new Select())->setName($field)->setId($field)->setData($dishesList)->html());
    } elseif ($field == 'count') {
        $form->addContent(Html::create('input')->setName($field)->setType("number")->setId($field)->html());
    } else {
        $form->addContent(Html::create('input')->setName($field)->setId($field)->html());
    }
}

$form->addContent(
    Html::create('Input')
        ->setType('submit')
        ->setValue('OK')
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