<?php

namespace View\Html;

class Textarea extends AbstractTag
{
    protected string $row = " row='50'";
    protected string $coll = " coll='50'";
    protected string $name;
    protected string $innerText;

    public function setRow(int $row): self
    {
        $this->row = " row='$row'";
        return $this;
    }

    public function setColl(int $coll): self
    {
        $this->coll = " coll='$coll'";
        return $this;
    }

    public function setInnerText(string $innerText): self
    {
        $this->innerText = $innerText;
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = " name='$name'";
        return $this;
    }

    public function html(): string
    {
        return "<textarea $this->name$this->class$this->style$this->coll$this->row>$this->innerText</textarea>";
    }
}
