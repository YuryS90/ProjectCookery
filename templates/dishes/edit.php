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
    ->setId('addForm')
    ->setClass('form');


foreach ($fields as $name => $value) {
    $form
        ->addContent(
            Html::create('Label')
                ->setFor($name)
                ->setInnerText($comments[$name])
                ->html()
        );

    if ($name == 'imgdishes') {
        $form
            ->addContent(
                Html::create('input')
                    ->setName($name)
                    ->setId($name)
                    ->setType('file')
                    ->setValue($value)
                    ->html()
            );

    } elseif ($name == 'composition') {
        $form
            ->addContent(
                Html::create('textarea')
                    ->setRow('70')
                    ->setColl('70')
                    ->setName($name)
                    ->setInnerText($value)
                    ->setId($name)
                    ->html()
            );

    } else {
        $form
            ->addContent(
                Html::create('input')
                    ->setName($name)
                    ->setId($name)
                    ->setValue($value)
                    ->html()
            );
    }
}

echo $form->addContent(Html::create('Input')->setType('hidden')->setName('id')->setValue($id)->html())
    ->addContent(Html::create('Input')->setType('submit')->setValue('Принять')->html())
    ->html();
