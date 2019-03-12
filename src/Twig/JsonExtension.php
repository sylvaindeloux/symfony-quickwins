<?php

namespace SylvainDeloux\SymfonyQuickwins\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class JsonExtension extends AbstractExtension
{
    public function getFilters()
    {
        return array(
            new TwigFilter('format_json', array($this, 'formatJson')),
        );
    }

    public function formatJson($data = null)
    {
        if (!$data) {
            return null;
        }

        $array = is_array($data) ? $data : json_decode($data);

        return json_encode($array, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }
}
