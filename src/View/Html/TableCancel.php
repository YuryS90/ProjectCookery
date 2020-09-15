<?php


namespace View\Html;


class TableCancel extends TableEdited
{
    public function data(array $data)
    {
        $str = "";

        foreach ($data as $row) {
//            print_r($row['status']);
            $str .= "\t<tr>\n";
            foreach ($row as $cell) {
//                print_r($cell);
                $str .= "\t\t<td>$cell</td>\n";
            }

            if ($cell != 'Отменён' && $cell != 'Готово') {
                $str .= "\t\t<td>" .
                    "<a role='button' href='?action=showedit&type=$this->type&id=$row[id]' class='btn btn-primary'>" .
                    "Изменить заказ</a><br>".
                    "<a role='button' href='?action=canceledit&type=$this->type&id=$row[id]' class='btn btn-danger'>" .
                    "Отменить заказ</a>".
                    "</td>\n";
            }

        }
        $this->data = $str;
        return $this;
    }

}

