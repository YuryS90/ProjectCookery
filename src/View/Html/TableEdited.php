<?php

namespace View\Html;

class TableEdited extends Table
{
    /**
     * @var null|string
     */
    protected $type;

    public function setControllerType(string $type): self
    {
        $this->type = $type;
        return $this;
    }
    
    /**
     * @return self
     */
    public function setHeaders(array $headers): self
    {
        parent::setHeaders($headers);
        $this->headers .= "\t<th></th>\n\t<th></th>\n";
        return $this;
    }

    /**
     * @return self
     */
    public function data(array $data): self
    {
        $str = "";

        foreach ($data as $row) {
            $str .= "\t<tr>\n";
            foreach ($row as $cell) {
                $str .= "\t\t<td>$cell</td>\n";
            }
            $str .= "\t\t<td><a href='?action=del&type=$this->type&id=$row[id]'>❌</a></td>\n";
            $str .= "\t\t<td><a href='?action=showedit&type=$this->type&id=$row[id]'>✏</a></td>\n";
            $str .= "\t</tr>\n";
        }

        $this->data = $str;
        return $this;
    }
}
