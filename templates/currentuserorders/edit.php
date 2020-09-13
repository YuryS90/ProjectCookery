<?php

use TexLab\Html\Html as Htmlt;
use TexLab\Html\Select;
use View\Html\Html;

/** @var int $id
 * @var string $type
 * @var array $fields
 * @var array $comments
 * @var array $usersList
 * @var array $dishesList Список блюд
 */

$form = Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=edit&type=$type")
    ->setId('addForm');


foreach ($fields as $name => $value) {

    if ($name == 'users_id') {
        $form
            ->addContent(
                Html::create('Input')
                    ->setType('hidden')
                    ->setName('id')
                    ->setValue($id)
                    ->html());

    }
    elseif ($name == 'date') {
        $form
            ->addContent(
                Htmlt::input()
                    ->setType('hidden')
                    ->setValue(date('Y-m-d H:i:s'))
                    ->setName($name)
                    ->setId($name)
                    ->html());

    } elseif ($name == 'dishes_id') {
        $form
            ->addContent(Html::create('Label')
                ->setFor($name)
                ->setClass('comment')
                ->setInnerText($comments[$name])
                ->html());

        $form
            ->addContent(
                (new Select())
                    ->setName($name)
                    ->setSelectedValues([$value])
                    ->setId($name)
                    ->setData($dishesList)
                    ->html()
            );
    } elseif ($name == 'count') {
        $form
            ->addContent(Html::create('Label')
                ->setFor($name)
                ->setClass('comment')
                ->setInnerText($comments[$name])
                ->html());

        $form
            ->addContent(
                Html::create('input')
                    ->setName($name)
                    ->setType("number")
                    ->setValue($value)
                    ->setId($name)
                    ->html()
            );

    } elseif ($name == 'status') {
        $form
            ->addContent(
                Html::create('Input')
                    ->setType('hidden')
                    ->setName($name)
                    ->setValue('Изменён(Ожидание)')
                    ->html());
    } else {
        $form
            ->addContent(Html::create('input')
                ->setName($name)
                ->setId($name)
                ->setValue($value)
                ->html());
    }
}

echo $form
    ->addContent(Html::create('Input')->setType('hidden')->setName('id')->setValue($id)->html())
    ->addContent(Html::create('Input')->setType('submit')->setValue('Применить')->html())
    ->html();
