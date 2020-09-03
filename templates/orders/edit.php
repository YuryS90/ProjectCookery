<?php

use TexLab\Html\Select;
use View\Html\Html;

/** @var int $id
 * @var string $type
 * @var array $fields
 * @var array $comments
 * @var array $usersList
 */

$form = Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=edit&type=$type")
    ->setClass('form');


foreach ($fields as $name => $value) {
    if($name == 'users_id') {
        $form->addContent(Html::create('Label')->setFor($name)->setInnerText($comments[$name])->html());
        $form->addContent('<br>');
        $form->addContent((new Select())->setName($name)->setSelectedValues([$value])->setId($name)->setData($usersList)->html());
        $form->addContent('<br>');
    } else {
        $form->addContent(Html::create('Label')->setFor($name)->setInnerText($comments[$name])->html());
        $form->addContent(Html::create('input')->setName($name)->setId($name)->setValue($value)->html());
    }
}

echo $form
    ->addContent(Html::create('Input')->setType('hidden')->setName('id')->setValue($id)->html())
    ->addContent(Html::create('Input')->setType('submit')->setValue('OK')->html())
    ->html();
