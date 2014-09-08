<?php

namespace Stencil;

use \cebe\markdown\Markdown;

class Parser
{
    public static function parse($text)
    {
        $parser = new \cebe\markdown\Markdown();
        $output = $parser->parse($text);
        $output = trim($output, "\n");

        return $output;
    }
}
