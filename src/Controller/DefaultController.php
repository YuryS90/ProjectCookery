<?php

namespace Controller;

class DefaultController extends AbstractController
{
    public function actionDefault()
    {
        $this
            ->view
            ->setFolder('default')
            ->setTemplate('default');
    }
}
