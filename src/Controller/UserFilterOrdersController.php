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

}
