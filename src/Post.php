<?php

namespace Stencil;

require __DIR__ . '/Parser.php';
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

    public function __construct($title = '',$content = '', $date = '', $layout = '')
    {
        $this->title = $title;
        $this->content = $content;
        $this->layout = $layout;
        $this->date = time($date);
    }

    public function parse($content)
    {
        $this->extract($content);
        $this->body = Parser::parse($this->bodyText);
    }

    public function extract($content)
    {
        $this->metaText = $this->_extractPostMeta($content);
        $this->meta = $this->_extractPostMetaData($this->metaText);
        $this->bodyText = $this->_extractPostBody($content);
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
