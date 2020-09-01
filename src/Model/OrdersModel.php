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
            ->setSelect('`orders`.`id`, `orders`.`id`, `orders`.`users_id`, `dishes`.`namedishes` AS dishes_id, `orders`.`totalvolume`, `orders`.`unit`, `orders`.`date`,`orders`.`status`, `users`.`FIO` AS users_id')
            ->setFrom('`users`, `orders`, `dishes`')
            ->setWhere('`users`.`id` = `orders`.`users_id`') // связь
            ->addWhere('`dishes`.`id` = `orders`.`dishes_id`')
            ->setOrderBy('`orders`.`id`') // по какому полю сортирование
            ->getPage($page);
    }

    public function getOrdersPageUserFilter(int $page, int $user_id)
    {
        return $this
            ->reset()
            ->setSelect('`orders`.`id`, `orders`.`id`, `orders`.`users_id`, `dishes`.`namedishes` AS dishes_id, `orders`.`totalvolume`, `orders`.`unit`, `orders`.`date`,`orders`.`status`, `users`.`FIO` AS users_id')
            ->setFrom('`users`, `orders`, `dishes`')
            ->setWhere("`users`.`id` = `orders`.`users_id` AND `orders`.`users_id` = $user_id") // связь
            ->setOrderBy('`orders`.`id`') // по какому полю сортирование
            ->getPage($page);
    }


}
