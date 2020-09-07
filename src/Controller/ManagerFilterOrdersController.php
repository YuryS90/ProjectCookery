<?php

namespace Controller;

use Core\Config;
use Model\DishesModel;
use Model\OrdersModel;
use Model\UsersModel;
use TexLab\MyDB\DB;
use View\View;

class ManagerFilterOrdersController extends AbstractTableController
{

    protected $tableName = "orders";
    protected $groupCod = "manager";


    public function __construct(View $view)
    {
        parent::__construct($view);
        $this->table = new OrdersModel(
            $this->tableName,
            DB::Link([
                'host' => Config::MYSQL_HOST,
                'username' => Config::MYSQL_USER_NAME,
                'password' => Config::MYSQL_PASSWORD,
                'dbname' => Config::MYSQL_DATABASE
            ])
        );

        $this
            ->view
            ->setFolder('managerorders');
    }


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
                'pageCount' => $this->table->pageCount()
            ]);

    }

    public function actionShowEdit(array $data)
    {

    }
}
