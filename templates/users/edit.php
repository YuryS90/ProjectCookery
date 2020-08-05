<?php

use View\Html\Html;

/** @var int $id
 * @var string $type
 * @var array $fields
 * @var array $comments
 */

$form = Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=edit&type=$type")
    ->setClass('form');


// foreach ($fields as $field) {
//     $form->addContent(Html::create('Label')->setFor($field)->setInnerText($comments[$field])->html());

//     if ($field != 'group_id') {
//         $form->addContent(Html::create('input')->setName($field)->setId($field)->html());
//     } else {
//         $form->addContent('<br>');
//         $form->addContent((new \TexLab\Html\Select())->setName($field)->setId($field)->setData($groupNames)->html());
//         $form->addContent('<br>');
//     }
// }

foreach ($fields as $name => $value) {
    $form->addContent(Html::create('Label')->setFor($name)->setInnerText($comments[$name])->html());
    if ($name != 'group_id') {
        $form->addContent(Html::create('input')->setName($name)->setId($name)->setValue($value)->html());
    } else {
        $form->addContent('<br>');
        $form->addContent((new \TexLab\Html\Select())->setName($name)->setId($name)->setSelectedValue($value)->setData($groupNames)->html());
        $form->addContent('<br>');
    }
}

echo $form->addContent(Html::create('Input')->setType('hidden')->setName('id')->setValue($id)->html())
    ->addContent(Html::create('Input')->setType('submit')->setValue('OK')->html())
    ->html();
