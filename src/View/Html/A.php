<?php


namespace View\Html;


class A extends AbstractTag
{
    protected $innerText;
    protected $href;


    public function __construct()
    {
        $this->clear();
    }

    public function clear(): self
    {
        $this->href =
        $this->class =
        $this->id =
        $this->style =
        $this->innerText = '';
        return $this;
    }

    public function setInnerText(string $innerText): self
    {
        $this->innerText = $innerText;
        return $this;
    }


    public function setHref(string $href): self
    {
        $this->href = " href='$href'";
        return $this;
    }


    public function html()
    {
        return "<a$this->href$this->class$this->id$this->style>$this->innerText</a>";
    }

}