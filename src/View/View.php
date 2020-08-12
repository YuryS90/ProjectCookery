<?php

namespace View;

use View\Html\Html;

class View
{
    private $layout;
    private $template;
    private $path;
    private $data;
    private $folder;

    public function __construct()
    {
        $this->path = $_SERVER['DOCUMENT_ROOT'] . dirname($_SERVER['SCRIPT_NAME']) . '/../templates/';
    }

    public function setLayout(string $layout)
    {
        $this->layout = $layout;
        return $this;
    }

    public function setFolder(string $folder)
    {
        $this->folder = $folder . '/';
        return $this;
    }

    public function setTemplate(string $template)
    {
        $this->template = $template;
        return $this;
    }

    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    public function addData(array $data)
    {
        $this->data = array_merge($this->data ?? [], $data);
        return $this;
    }

    public function view()
    {
        $controllerType = $this->data['controllerType'];
        include "$this->path$this->layout.php";
    }

    public function body()
    {
        if (is_array($this->data)) {
            extract($this->data);
        }
        Html::create('input');
        include "$this->path$this->folder$this->template.php";
    }
}
