<?php

use TexLab\Html\Select;
use View\Html\Html;

/**
 * @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 * @var array $usersList Список пользователей
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

foreach ($fields as $field) {
    $form->addContent(Html::create('Label')->setFor($field)->setInnerText($comments[$field])->html());

    /*
     * выбираем id того пользователя, от ФИО которого новый заказ. Где полученное значение будет подставлено
     * в поле users_id, которое озаглавлено как  ФИО
     * */
    if ($field != 'users_id') {
        $form->addContent(Html::create('input')->setName($field)->setId($field)->html());
    } else {
        $form->addContent('<br>');
        $form->addContent((new Select())->setName($field)->setId($field)->setData($usersList)->html());
        $form->addContent('<br>');
    }
}

$form->addContent(
    Html::create('Input')
        ->setType('submit')
        ->setValue('OK')
        ->html()
);

echo $form->html();

/*
 * print_r($usersList);
 * это показатель того, что пришёл массив с пользователями
 * Array ( [47] => Вася [46] => Игорь [30] => Юрий )
 * Затем есть заранее подготовленный класс с выпадающим списком
 * */