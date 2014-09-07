<?php

namespace Stencil;

class Post
{
    public $title;
    public $layout;
    public $date;
    public $content;

    public $metaText;
    public $bodyText;
    public $meta;
    public $body;

    public function __construct($title = '', $date = '', $layout = '', $content = '')
    {
        $this->title = $title;
        $this->layout = $layout;
        $this->content = $content;
        $this->date = time($date);
    }

    public function extract($content)
    {
        $this->metaText = $this->_extractPostMeta($content);
        $this->meta = $this->_extractPostMetaData($this->metaText);
        $this->bodyText = $this->_extractPostBody($content);
    }

    public function parse($content)
    {
        $this->extract($content);
        $this->body = Parser::parse($this->bodyText);
    }

    private function _extractPostMeta($content)
    {
        preg_match('/-{3}\n([\s\S]+?)\n-{3}\n/', $content, $match);

        return $match[1];
    }

    private function _extractPostMetaData($meta)
    {
        preg_match_all('/([\S]+?): ([\S ]+)/', $meta, $data);
        array_splice($data, 0, 1);

        foreach ($data[0] as $key => $value)
            $output[$value] = $data[1][$key];

        return $output;
    }

    private function _extractPostBody($content)
    {
        preg_match('/-{3}\n\n([\s\S]+)/', $content, $match);

        return $match[1];
    }
}
