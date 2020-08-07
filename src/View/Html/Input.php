<?php

namespace View\Html;

class Input extends AbstractTag
{
    protected string $value = '';
    protected string $type = " type='text'";
    protected string $name;

    public function setType(string $type): self
    {
        if (
            in_array($type, [
            'text',
            'button',
            'submit',
            'reset',
            'password',
            'file',
            'checkbox',
            'hidden'
            ])
        ) {
            $this->type = " type='$type'";
        }
        return $this;
    }

    public function setValue(string $value): self
    {
        $this->value = " value='$value'";
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = " name='$name'";
        return $this;
    }

    public function html(): string
    {
        return "<input$this->type$this->value$this->name$this->style$this->class$this->id>\n";
    }
}
