<?php

namespace Controller;

class DishesController extends AbstractTableController
{

    protected  $tableName = "dishes";

    public function __construct($view)
    {
        parent::__construct($view);

        $this->view->setFolder('dishes');
    }

    public function actionAdd(array $data)
    {
        $data['post']['imgdishes'] = $_FILES['imgdishes']['name'];

        $ext = pathinfo($_FILES['imgdishes']['name'], PATHINFO_EXTENSION);

        $id = $this->table->add($data['post']);

        move_uploaded_file(
            $_FILES['imgdishes']['tmp_name'],
            "images/dishes/$id.$ext"
        );

        $this->redirect('?action=show&type=' . $this->getClassName());
    }

    public function actionEdit(array $data)
    {
        $data['post']['imgdishes'] = $_FILES['imgdishes']['name'];
        $ext = pathinfo($_FILES['imgdishes']['name'], PATHINFO_EXTENSION);
        $id = $data['post']['id'];

        move_uploaded_file(
            $_FILES['imgdishes']['tmp_name'],
            "images/dishes/$id.$ext"
        );

        parent::actionEdit($data);
    }

    public function actionDel(array $data)
    {
        $id = $data['get']['id'];
        $img = $this->table->get(['id'=>$id])[0]['imgdishes'];
        $ext = pathinfo($img, PATHINFO_EXTENSION);
        if(file_exists("images/dishes/$id.$ext")){
            unlink("images/dishes/$id.$ext");
        }

        parent::actionDel($data);
    }
}
