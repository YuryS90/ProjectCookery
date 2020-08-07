<?php

namespace View\Html;

class Table extends AbstractTag
{
    protected string $data;

    /**
     * @var null|string
     */
    protected $headers;


    public function __construct()
    {
        $this->clear();
    }

    public function clear(): self
    {
        $this->style = '';
        $this->data = '';
        return $this;
    }

    /**
     * @return self
     */
    public function setHeaders(array $headers): self
    {
        $str = '';

        foreach ($headers as $value) {
            $str .= "\t<th>$value</th>\n";
        }
        $this->headers = $str;
        return $this;
    }
}
