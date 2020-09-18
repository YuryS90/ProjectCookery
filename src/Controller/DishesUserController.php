<?php

namespace Controller;

use Core\Config;

class DishesUserController extends DishesManagerController
{
    public function __construct($view)
    {
        parent::__construct($view);

        $this
            ->view
            ->setFolder('dishesuser');
    }

    public function actionShow(array $data)
    {
        parent::actionShow($data); // TODO: Change the autogenerated stub
        
        $this
            ->view
            ->setTemplate('userShow')
            ->setData([
                'table' => $this
                    ->table
                    ->reset()
                    ->setPageSize(Config::PAGE_SIZE_DISH_USERS)
                    ->getDishesStatusFilter($data['get']['page'] ?? 1),
                'fields' => array_diff($this->table->getColumnsNames(), ['id']),
                'comments' => $this->table->getColumnsComments(),
                'type' => $this->getClassName(),
                'pageCount' => $this->table->pageCountDishesStatus()
            ]);
    }
}
