<?php

namespace Controller;

use Core\Config;
use Model\CRUDInterface;
use TexLab\MyDB\DB;
use TexLab\MyDB\DbEntity;
use View\View;
use Model\DbTable;
use mysqli;
use Model\DbConection;

abstract class AbstractTableController extends AbstractController implements CRUDControllerInterface
{
    protected $table; // CRUDInterface
    protected $view; // View
    protected $tableName;

    public function __construct(View $view)
    {
        $this->table = new DbEntity(
            $this->tableName,
            DB::Link([
                'host' => Config::MYSQL_HOST,
                'username' => Config::MYSQL_USER_NAME,
                'password' => Config::MYSQL_PASSWORD,
                'dbname' => Config::MYSQL_DATABASE
            ])
        );

        parent::__construct($view);
        $this->view->setFolder('table');
    }

    public function actionShow(array $data)
    {
        //        $currentPage = $data['get']['page'] ?? 1;
        //        print_r($data);
        // print_r($this->table->getComments());
        // $fields = $this->table->getFields();
        // unset($fields['id']);
        // echo $this->getClassName();
        //        $fields = array_diff($this->table->getFields(), ['id']);

        $this
            ->view
            ->setTemplate('show')
            ->setData([
                'table' => $this
                    ->table
                    ->reset()
                    ->setPageSize(Config::PAGE_SIZE)
                    ->getPage($data['get']['page'] ?? 1),
                'fields' => array_diff($this->table->getColumnsNames(), ['id']),
                'comments' => $this->table->getColumnsComments(),
                'type' => $this->getClassName(),
                'pageCount' => $this->table->pageCount()
            ]);

        //        echo $this->table
        //            ->setSelect("id")
        //            ->addSelect("adress")
        //            ->setFrom("gb")
        //            ->addFrom("phonebook")
        //            ->setWhere("adress = 'Московский проспект'")
        //            ->addWhere("name = 'Vasia'")
        //            ->setGroupBy("name")
        //            ->addGroupBy("lastname")
        //            ->setHaving("sum(adress)>5")
        //            ->addHaving("count(name) <80")
        //            ->setOrderBy("id")
        //            ->addOrderBy("name")
        //            ->setLimit("5, 9")
        //            ->getSql();
        //        $tmp = $this->table->setPageSize(2)->getPage(2);
        //        print_r($tmp);
        //        print_r($this->table->getPageCount());
    }

    public function actionAdd(array $data)
    {
        // print_r($data);
        // try {
        $this->table->add($data['post']);
        // } catch (\Throwable $th) {
        //     $_SESSION['errors'][] = $th->getMessage();
        // } finally {
        $this->redirect('?action=show&type=' . $this->getClassName());
        // }
    }

    public function actionDel(array $data)
    {

        // print_r($data);
        if (isset($data['get']['id'])) {
            $this->table->del(['id' => $data['get']['id']]);
        }
        $this->redirect('?action=show&type=' . $this->getClassName());
    }

    public function actionShowEdit(array $data)
    {
        // print_r($data['get']['id']);
        $id = $data['get']['id'];

        $viewData = $this->table->get(['id' => $id])[0];

        unset($viewData['id']); // Del id

        $this
            ->view
            ->setTemplate('edit')
            ->setData([
                'fields' => $viewData,
                'id' => $id,
                'type' => $this->getClassName(),
                'comments' => $this->table->getColumnsComments()
            ]);


        // print_r($viewData);
    }

    public function actionEdit(array $data)
    {
        // print_r($data);

        $editData = $data['post'];
        unset($editData['id']);

        // print_r($editData);

        $this->table->edit(['id' => $data['post']['id']], $editData);
        $this->redirect('?action=show&type=' . $this->getClassName());
    }
}
