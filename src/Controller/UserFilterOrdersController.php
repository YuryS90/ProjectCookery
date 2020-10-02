<?php

namespace Controller;

use Core\Config;
use Model\DishesModel;
use Model\OrdersModel;
use Model\UsersModel;
use TexLab\MyDB\DB;
use View\View;

class UserFilterOrdersController extends ManagerFilterOrdersController
{
    protected $groupCod = "user";

    public function actionShow(array $data)
    {
        $this
            ->view
            ->setTemplate('show')
            ->setData([
                'table' => $this
                    ->table
                    ->reset()
                    ->setPageSize(Config::PAGE_SIZE)
                    ->getOrdersPageByUserCod($data['get']['page'] ?? 1, $this->groupCod),
                'fields' => array_diff($this->table->getColumnsNames(), ['id']),
                'comments' => $this->table->getColumnsComments(),
                'type' => $this->getClassName(),
                'pageCount' => $this->table->pageCountUser(),
                'currentPage' => $data['get']['page'] ?? 1
            ]);
    }

}
