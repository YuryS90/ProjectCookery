<?php

namespace Controller;

use Core\Config;
use Model\UsersModel;
use TexLab\MyDB\DB;

class OrdersController extends AbstractTableController
{

    protected $tableName = "orders";
    protected $usersTable;

    /*
     * в конструкторе предок получет соединение с БД
     * делаем ещё одну подключение. мы хотим получить список пользователей из таблицы users
     * для того чтобы сделать выпадающий список нужен список пользователей. Этот список может
     * вернуть метод getUsers(), который находиться в UsersModel
     * */

    /*
     * создаём экземпляр UsersModel, где должны передать подключение к БД
     * */
    public function actionShow(array $data)
    {
        parent::actionShow($data);
        $this
            ->view
            ->setFolder('orders');

        /*
         * ДЛя UsersModel в __construct передаётся (string $tableName, mysqli $mysqli)
         * */
        $this->usersTable = new UsersModel(
            "users",
            DB::Link([
                'host' => Config::MYSQL_HOST,
                'username' => Config::MYSQL_USER_NAME,
                'password' => Config::MYSQL_PASSWORD,
                'dbname' => Config::MYSQL_DATABASE
            ])
        );

//        $this->usersTable->getUsers();

        /*
         * Добавляем данные
         * */
        $this->view->adddata(
            [
                "usersList" => $this->usersTable->getUsers()
            ]
        );

        // в show будем ловить usersList
//        print_r($this->usersTable->getUsers());
    }
}