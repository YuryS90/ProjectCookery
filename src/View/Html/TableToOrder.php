<?php


namespace View\Html;


class TableToOrder extends TableEdited
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
                "<a role='button' href='?action=addorder&type=currentuserorders&id=$row[id]' class='btn btn-success'>" .
                "Заказать</a></td>\n";
        }
        $this->data = $str;
        return $this;
    }

}

