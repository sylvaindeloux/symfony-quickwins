<?php

namespace SylvainDeloux\SymfonyQuickwins\Controller;

use Symfony\Component\HttpFoundation\Request;

interface PreExecuteInterface
{
    /**
     * @param Request $request
     */
    public function preExecute(Request $request);
}
