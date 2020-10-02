<?php

namespace View\Html;

class TableEdited extends Table
{
    protected $type;

    public function setControllerType(string $type)
    {
        $this->type = $type;
        return $this;
    }
    public function setHeaders(array $headers)
    {
        parent::setHeaders($headers);
        $this->headers .= "\t<th></th>\n\t<th></th>\n";
        return $this;
    }

    public function data(array $data)
    {
        $str = "";

        foreach ($data as $row) {
            $str .= "\t<tr>\n";
            foreach ($row as $cell) {
                $str .= "\t\t<td>$cell</td>\n";
            }
            $str .= "\t\t<td>" .
                "<button type='button' class='btn btn-danger dropdown-toggle'" .
                "data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Опции</button>\n" .
                "<div class='dropdown-menu'>" .
                "<a class='dropdown-item' href='?action=del&type=$this->type&id=$row[id]'>Удалить</a>" .
                "<a class='dropdown-item' href='?action=showedit&type=$this->type&id=$row[id]'>Редактировать</a>" .
//                "<a class='dropdown-item popup__link' href='#popup'>Редактировать</a>" .
                "</div></td>\n";


            // $str .= "\t\t<td><a href='?action=del&type=$this->type&id=$row[id]'>❌</a></td>\n";
            // $str .= "\t\t<td><a href='?action=del&type=$this->type&id=$row[id]'>❌</a></td>\n";
            // $str .= "\t\t<td><a href='?action=showedit&type=$this->type&id=$row[id]'>✏</a></td>\n";
            // $str .= "\t</tr>\n";
        }

        $this->data = $str;
        return $this;
    }
}
