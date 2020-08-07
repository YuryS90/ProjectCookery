<?php

namespace Controller;

class DefaultController extends AbstractController
{
    public function actionDefault(): void
    {
        $this
            ->view
            ->setFolder('default')
            ->setTemplate('default');
    }
}
