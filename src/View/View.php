<?php

namespace View;

use View\Html\Html;

class View
{
    /**
     * @var null|string
     */
    private $layout;

    /**
     * @var null|string
     */
    private $template;
    private string $path;

    /**
     * @var array|null
     */
    private $data;

    /**
     * @var null|string
     */
    private $folder;

    public function __construct()
    {
        $this->path = $_SERVER['DOCUMENT_ROOT'] . dirname($_SERVER['SCRIPT_NAME']) . '/../templates/';
    }

    public function setLayout(string $layout): self
    {
        $this->layout = $layout;
        return $this;
    }

    public function setFolder(string $folder): self
    {
        $this->folder = $folder . '/';
        return $this;
    }

    public function setTemplate(string $template): self
    {
        $this->template = $template;
        return $this;
    }

    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function addData(array $data): self
    {
        $this->data = array_merge($this->data ?? [], $data);
        return $this;
    }

    public function view(): void
    {
        $controllerType = $this->data['controllerType'];
        include "$this->path$this->layout.php";
    }
}
