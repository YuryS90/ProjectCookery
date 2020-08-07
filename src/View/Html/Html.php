<?php

namespace View\Html;

class Html
{
    public static function create(string $className): object
    {
        $className = "View\\Html\\$className";
        return new $className();
    }
}
