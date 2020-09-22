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

    $form
        ->addContent(Html::create('Label')
            ->setFor($name)
            ->setClass('comment')
            ->setInnerText($comments[$name])
            ->html());

    if ($name == 'users_id') {
        $form
            ->addContent(
                (new Select())
                    ->setName($name)
                    ->setSelectedValues([$value])
                    ->setId($name)
                    ->setData($usersList)
                    ->html()
            );

    } elseif ($name == 'date') {
        $form
            ->addContent(
                Htmlt::input()
                    ->setType('datetime-local')
                    ->setValue(date("Y-m-d\TH:i:s", strtotime($value)))
                    ->setDisabled()
                    ->setName($name)
                    ->setId($name)
                    ->html());

    } elseif ($name == 'dishes_id') {
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
            ->addContent((new Select())
                ->setName($name)
                ->setId($name)
                ->setSelectedValues([$value])
                ->setData(
                    [
                        'Ожидание' => 'Ожидание',
                        'Готово' => 'Готово',
                        'Отменён' => 'Заказ отменён',
                        'Оплачено' => 'Заказ оплачен'
                    ]
                )
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
