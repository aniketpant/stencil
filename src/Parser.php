<?php

namespace Stencil;

use \cebe\markdown\Markdown;

class Parser
{
    public static function parse($text)
    {
        $parser = new \cebe\markdown\Markdown();

        return $parser->parse($text);
    }
}
