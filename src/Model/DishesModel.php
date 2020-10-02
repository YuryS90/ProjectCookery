<?php


namespace Model;

use Core\Config;
use mysqli;
use TexLab\MyDB\DbEntity;

class DishesModel extends DbEntity
{
    public function __construct(string $tableName, mysqli $mysqli)
    {
        parent::__construct($tableName, $mysqli);
    }


    /*
     * Возвращает список всех блюд
     * */
    public function getDishes()
    {
        $data = $this->runSQL('SELECT `id`,`namedishes` FROM `dishes`');
        $result = [];
        foreach ($data as $row) {
            $result[$row['id']] = $row['namedishes'];
        }
        return $result;
    }

    /*
    * Фильтр статуса активных блюд
    * */
    public function getDishesStatusFilter(int $page)
    {
        // Сам запрос: SELECT * FROM dishes WHERE statusdish = 'Актуально'
        return $this
            ->reset()
            ->setSelect('*')
            ->setFrom('`dishes`')
            ->setWhere("`statusdish` = 'Актуально'")
            ->getPage($page);
    }

    /*
     * подсчёт страниц
    * */
    public function pageCountDishesStatus()
    {
        // print_r($this->runSQL("SELECT COUNT(*) as count FROM dishes WHERE statusdish='Актуально'"));
        return ceil($this->runSQL("SELECT COUNT(*) as count FROM dishes WHERE statusdish='Актуально'")[0]['count'] / $this->pageSize);
    }

    /**
     * Количество заказов, в котором фигурирует одно какое-то блюдо
     * @param int $dishes_id
     * @return mixed
     */
    public function getCountOrdersDish(int $dishes_id)
    {
        //SELECT COUNT(*) as count FROM orders, dishes WHERE `dishes`.`id` = `orders`.`dishes_id` AND `orders`.`dishes_id` = 19
        return $this->runSQL("SELECT COUNT(*) as count FROM orders, dishes WHERE `dishes`.`id` = `orders`.`dishes_id` AND `orders`.`dishes_id` = $dishes_id")[0]['count'];
    }
}