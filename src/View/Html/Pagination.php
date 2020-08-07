<?php

namespace View\Html;

class Pagination extends AbstractTag
{
    protected $pageCount;
    protected string $type;

    public function setControllerType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function setPageCount($pageCount): self
    {
        $this->pageCount = $pageCount;
        return $this;
    }

    public function html(): string
    {
        $str = "<div$this->class$this->style$this->id>\n";
        for ($i = 1; $i <= $this->pageCount; $i++) {
            $str .= "\t<a href='?action=show&type=$this->type&page=$i'>$i</a>\n";
        }
        $str .= "</div>\n";

        return $str;
    }
}
