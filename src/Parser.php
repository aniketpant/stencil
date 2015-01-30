<?php

namespace Stencil;

class Parser
{
    public static function parse($text)
    {
        $parser = new \Parsedown();
        $output = $parser->text($text);
        $output = trim($output, "\n");

        return $output;
    }
}
