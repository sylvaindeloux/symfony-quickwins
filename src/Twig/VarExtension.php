<?php

namespace SylvainDeloux\SymfonyQuickwins\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class VarExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return array(
            new TwigFunction('static', array($this, 'getStatic')),
        );
    }

    public function getStatic(string $class, string $property)
    {
        if (!property_exists($class, $property)) {
            return null;
        }

        return $class::$$property;
    }
}
