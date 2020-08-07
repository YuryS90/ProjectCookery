<?php

namespace View\Html;

class Label extends AbstractTag
{
    protected string $for;
    protected string $innerText;

    public function setFor(string $for): self
    {
        $this->for = " for='$for'";
        return $this;
    }

    public function setInnerText(string $text): self
    {
        $this->innerText = $text;
        return $this;
    }

    public function html(): string
    {
        return "<label$this->style$this->class$this->id$this->for>$this->innerText</label>\n";
    }
}
