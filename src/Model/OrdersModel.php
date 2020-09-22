<?php


namespace Model;


use TexLab\MyDB\DbEntity;

class OrdersModel extends DbEntity
{

    //для построниченого отображения заказов
    public function getOrdersPage(int $page)
    {
        /*
         * Тут будут связаны таблицы orders с users
         * */
        return $this
            ->reset()
            ->setSelect('`orders`.`id`,`users`.`FIO` AS users_id,`dishes`.`namedishes` AS dishes_id,`orders`.`count`,`orders`.`date`,`orders`.`status`')
            ->setFrom('`users`, `orders`, `dishes`')
            ->setWhere('`users`.`id` = `orders`.`users_id`') // связь
            ->addWhere('`dishes`.`id` = `orders`.`dishes_id`')
            ->setOrderBy('`orders`.`id`') // по какому полю сортирование
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
            ->setOrderBy('`orders`.`id`') // по какому полю сортирование
            ->getPage($page);
    }

    /*
     * Изменение статуса
     * */
    public function getEditStatus(string $id)
    {
        $this->runSQL("UPDATE orders SET `status`= 'Отменён' WHERE id = '$id';");
    }

    /*
     * Добавление заказов
     * */
    public function getAddOrders(string $users_id, string $dishes_id)
    {
        $data = date('Y-m-d H:i:s');
        $this->runSQL("INSERT INTO orders (users_id, dishes_id, count, date, status)" .
            "VALUES ('$users_id', '$dishes_id', '1', '$data', 'Ожидание');");
    }

    /*
     * Вывод общей цены с условием статусов
     * */
    public function getTotalPrice(int $user_id)
    {
        return (float)$this->runSQL("SELECT SUM(dishes.price * orders.count) AS 'sum' FROM dishes, orders, users WHERE dishes.id = orders.dishes_id AND orders.users_id = users.id AND users.id = $user_id AND orders.status <> 'Отменён'  AND orders.status <> 'Оплачено'")[0]['sum'];
    }


//     public function pageCountApplication(int $user_id)
//     {
// //        print_r($this->runSQL("SELECT COUNT(*) as count FROM application, users WHERE `users`.`id` = `application`.`users_id` AND `application` . `users_id` = $user_id"));
//         return ceil($this->runSQL("SELECT COUNT(*) as count FROM application, users WHERE `users`.`id` = `application`.`users_id` AND `application` . `users_id` = $user_id")[0]['count'] / $this->pageSize);
//     }
}
