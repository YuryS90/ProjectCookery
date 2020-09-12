<?php


namespace Controller;


use Core\Config;

class RegController extends UsersController
{
    public function actionShow(array $data)
    {
        $this
            ->view
            ->setFolder('registration') // зашли в соответствующую папку
            ->setTemplate('show') // выбрали в папке registration файл show.php
            ->setLayout('planeLayout') // выбрали layout без менюшки
            ->addData([]);
    }

    public function actionShowEdit(array $data)
    {

    }

    public function actionEdit(array $data)
    {

    }

    public function actionDel(array $data)
    {

    }

    public function actionAdd(array $data)
    {

        $data['post']['group_id'] = $this->table->getGroupIdByCode('user');

        $this->table->add($data['post']);

        $this->redirect('?action=show&type=напишу сюда для посетителей' . $this->getClassName());
    }


}