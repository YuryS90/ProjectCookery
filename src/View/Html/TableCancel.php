<?php


namespace View\Html;


class TableCancel extends TableEdited
{
    public function data(array $data)
    {
        $str = "";

        foreach ($data as $row) {
            $str .= "\t<tr>\n";
            foreach ($row as $cell) {
                $str .= "\t\t<td>$cell</td>\n";
            }
            $str .= "\t\t<td>" .
                "<a role='button' href='?action=showedit&type=$this->type&id=$row[id]' class='btn btn-primary'>" .
                "Изменить заказ</a><br>".
                "<a role='button' href='?action=canceledit&type=$this->type&id=$row[id]' class='btn btn-danger'>" .
                "Отменить заказ</a>".
                "</td>\n";
        }
        $this->data = $str;
        return $this;
    }

}

