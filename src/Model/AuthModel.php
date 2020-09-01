<?php


namespace Model;


use TexLab\MyDB\DbEntity;

class AuthModel extends DbEntity
{
    public function checkUser(string $login, string $password)
    {
        return $this
            ->reset()
            ->setSelect('`users`.`id`, `cod`, `FIO`, `group`.`name`')
            ->setFrom('`users`,`group`')
            ->setWhere('`users`.`group_id` = `group`.`id`')
            ->addWhere("BINARY `users`.`login`= '$login'")
            ->addWhere("BINARY `users`.`password`= '$password'")
            ->get()[0];
    }

    public function checkLoginExists(string $login)
    {
        return (int)$this
            ->reset()
            ->setSelect('count(*) AS C')
            ->setFrom('`users`,`group`')
            ->setWhere('`users`.`group_id` = `group`.`id`')
            ->addWhere("BINARY `users`.`login`= '$login'")
            ->get()[0]['C'];
    }
}
