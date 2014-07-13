<?php

namespace Stencil;

class Post {
    public $title;
    public $layout;
    public $date;
    public $content;

    public $meta;
    public $body;

    function __construct($title = '', $date = '', $layout = '', $content = '')
    {
        $this->title = $title;
        $this->layout = $layout;
        $this->content = $content;
        $this->date = time($date);
    }

    public function parse($content)
    {
        $this->meta = $this->_parsePostMeta($content);
        $this->body = $this->_parsePostBody($content);
    }

    public function getPostMeta()
    {
        return $this->meta;
    }

    public function getPostBody()
    {
        return $this->body;
    }

    private function _parsePostMeta($content)
    {
        preg_match('/-{3}\n([\s\S]+)\n-{3}\n/', $content, $match);

        return $match[1];
    }

    private function _parsePostBody($content)
    {
        preg_match('/-{3}\n\n([\s\S]+)/', $content, $match);

        return $match[1];
    }
}
