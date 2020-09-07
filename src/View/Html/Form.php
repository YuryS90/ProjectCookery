<?php

namespace View\Html;

class Form extends AbstractTag
{
    protected $action = "";
    protected $method = "GET";
    protected $content = "";
//    protected $classg;

    public function setAction(string $action)
    {
        $this->action = $action;
        return $this;
    }

//    public function addClass(string $class1, string $class2)
//    {
//        $this->classg = " class='$class1 $class2'";
//        return $this;
//    }

    public function setContent(string $content)
    {
        $this->content = $content;
        return $this;
    }

    public function addContent(string $content)
    {
        $this->content .= $content;
        return $this;
    }

    public function setMethod($method)
    {
        if (in_array($method, ["POST", "GET"])) {
            $this->method = $method;
        }
        return $this;
    }


    public function html()
    {
        return "<form enctype='multipart/form-data'" .
            "action='$this->action'" .
            "method='$this->method'" .
            "$this->class$this->style$this->id>\n" .
            "$this->content</form>";
    }
}
