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
        $this->metaText = $this->_parsePostMeta($content);
        $this->meta = $this->_parsePostMetaData($this->metaText);
        $this->body = $this->_parsePostBody($content);
    }

    public function getPostMetaText()
    {
        return $this->metaText;
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
        preg_match('/-{3}\n([\s\S]+?)\n-{3}\n/', $content, $match);

        return $match[1];
    }

    private function _parsePostMetaData($meta)
    {
        preg_match_all('/([\S]+?): ([\S ]+)/', $meta, $data);
        array_splice($data, 0, 1);

        foreach ($data[0] as $key => $value)
            $output[$value] = $data[1][$key];

        return $output;
    }

    private function _parsePostBody($content)
    {
        preg_match('/-{3}\n\n([\s\S]+)/', $content, $match);

        return $match[1];
    }
}
