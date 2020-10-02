<?php


namespace Model;


use TexLab\MyDB\DbEntity;

class OrdersModel extends DbEntity
{
    /**
     * для построниченого отображения заказов
     */
    public function getOrdersPage(int $page)
    {
        /**
         * Тут будут связаны таблицы orders с users
         */
        return $this
            ->reset()
            ->setSelect('`orders`.`id`,`users`.`FIO` AS users_id,`dishes`.`namedishes` AS dishes_id,`orders`.`count`,`orders`.`date`,`orders`.`status`')
            ->setFrom('`users`, `orders`, `dishes`')
            ->setWhere('`users`.`id` = `orders`.`users_id`') // связь
            ->addWhere('`dishes`.`id` = `orders`.`dishes_id`')
            ->setOrderBy('`orders`.`date` DESC') // по какому полю сортирование
            // ->getSQL();
            ->getPage($page);
    }


    public function getOrdersPageUserFilter(int $page, int $user_id)
    {
        return $this
            ->reset()
            ->setSelect('`orders`.`id`,`users`.`FIO` AS users_id,`dishes`.`namedishes` AS dishes_id,`orders`.`count`,`orders`.`date`,`orders`.`status`')
            ->setFrom('`users`, `orders`, `dishes`')
            ->setWhere('`users`.`id` = `orders`.`users_id`') // связь
            ->addWhere('`dishes`.`id` = `orders`.`dishes_id`')
            ->addWhere("`orders`.`users_id` = $user_id")
            ->setOrderBy('`orders`.`id`') // по какому полю сортирование
            ->getPage($page);
    }

    public function getOrdersPageByUserCod(int $page, string $user_cod)
    {
        return $this
            ->reset()
            ->setSelect('`orders`.`id`,`users`.`FIO` AS users_id,`dishes`.`namedishes` AS dishes_id,`orders`.`count`,`orders`.`date`,`orders`.`status`')
            ->setFrom('`users`, `orders`, `dishes`,`group`')
            ->setWhere('`users`.`id` = `orders`.`users_id`') // связь
            ->addWhere('`dishes`.`id` = `orders`.`dishes_id`')
            ->addWhere('`group`.`id` = `users`.`group_id`')
            ->addWhere("`group`.`cod` = '$user_cod'")
            ->setOrderBy('`orders`.`date` DESC') // по какому полю сортирование
            ->getPage($page);
    }

    /**
     * Изменение статуса
     */
    public function getEditStatus(string $id)
    {
        $this->runSQL("UPDATE orders SET `status`= 'Отменён' WHERE id = '$id';");
    }


    /**
     * Добавление заказов
     */
    public function getAddOrders(string $users_id, string $dishes_id)
    {
        $data = date('Y-m-d H:i:s');
        $this->runSQL("INSERT INTO orders (users_id, dishes_id, count, date, status)" .
            "VALUES ('$users_id', '$dishes_id', '1', '$data', 'Ожидание');");
    }

    /**
     * Вывод общей цены с условием статусов
     */
    public function getTotalPrice(int $user_id)
    {
        return (float)$this->runSQL("SELECT SUM(dishes.price * orders.count) AS 'sum' FROM dishes, orders, users WHERE dishes.id = orders.dishes_id AND orders.users_id = users.id AND users.id = $user_id AND orders.status <> 'Отменён'  AND orders.status <> 'Оплачено'")[0]['sum'];
    }


    /**
     * @param int $user_id
     * @return false|float
     * Числовое отображение страниц только текущего пользователя
     */
    public function pageCountCurrentUser(int $user_id)
    {
        // SELECT COUNT(*) as count FROM orders, users WHERE `users`.`id` = `orders`.`users_id` AND `orders` . `users_id` = 30
        //print_r($this->runSQL("SELECT COUNT(*) as count FROM orders, users WHERE `users`.`id` = `orders`.`users_id` AND `orders` . `users_id` = $user_id"));
        return ceil($this->runSQL("SELECT COUNT(*) as count FROM orders, users WHERE `users`.`id` = `orders`.`users_id` AND `orders` . `users_id` = $user_id")[0]['count'] / $this->pageSize);
    }

    /**
     * Числовое отображение страниц только manager
     */
    public function pageCountManager()
    {
        //SELECT COUNT(*) as count FROM orders, users WHERE `users`.`id` = `orders`.`users_id` AND `orders` . `users_id` AND `users`.`group_id` = 3
        return ceil($this->runSQL("SELECT COUNT(*) as count FROM orders, users WHERE `users`.`id` = `orders`.`users_id` AND `orders` . `users_id` AND `users`.`group_id` = 3")[0]['count'] / $this->pageSize);
    }

    /**
     * Числовое отображение страниц только user
     */
    public function pageCountUser()
    {
        //SELECT COUNT(*) as count FROM orders, users WHERE `users`.`id` = `orders`.`users_id` AND `orders` . `users_id` AND `users`.`group_id` = 2
        return ceil($this->runSQL("SELECT COUNT(*) as count FROM orders, users WHERE `users`.`id` = `orders`.`users_id` AND `orders` . `users_id` AND `users`.`group_id` = 2")[0]['count'] / $this->pageSize);
    }


//    public function getLastRow(int $user_id)
//    {
//        // получение последней строки (последнего заказа) в таблице
//        //SELECT * FROM orders ORDER BY id DESC LIMIT 1;
////        print_r($this->runSQL("SELECT * FROM orders ORDER BY $user_id DESC LIMIT 1;"));
//        return $this->runSQL("SELECT * FROM orders ORDER BY $user_id DESC LIMIT 1;");
//    }

    /**
     * Автоматическое удаление заказов, старше 30 дней
     */
    public function getAutomaticDelOrders()
    {
        //DELETE FROM orders WHERE `date` < (NOW() - INTERVAL 7 DAY)
        return $this->runSQL("DELETE FROM orders WHERE `date` < (NOW() - INTERVAL 30 DAY)");
    }

}
