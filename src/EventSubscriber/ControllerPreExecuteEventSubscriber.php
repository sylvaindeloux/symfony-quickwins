<?php

namespace SylvainDeloux\SymfonyQuickwins\EventSubscriber;

use SylvainDeloux\SymfonyQuickwins\Controller\PreExecuteInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\KernelEvents;

class ControllerPreExecuteEventSubscriber implements EventSubscriberInterface
{
    public function onCoreController($event)
    {
        if (HttpKernelInterface::MASTER_REQUEST !== $event->getRequestType()) {
            return;
        }

        $controllerCallable = $event->getController();

        if (!is_array($controllerCallable) || !isset($controllerCallable[0])) {
            return;
        }

        $controller = $controllerCallable[0];

        if (!$controller instanceof PreExecuteInterface) {
            return;
        }

        $controller->preExecute($event->getRequest());
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::CONTROLLER => 'onCoreController',
        );
    }
}
