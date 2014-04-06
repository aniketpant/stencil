<?php

namespace Stencil;

class Post {
  public $title;
  public $layout;
  public $content;
  public $date;

  function __construct($title = '', $date = '', $layout = '', $content = '')
  {
    $this->title = $title;
    $this->layout = $layout;
    $this->content = $content;
    $this->date = time($date);
  }

  public function parse($content) {
    $meta = $this->_getYamlData($content);
    return $meta;
  }

  private function _getYamlData($content) {
    preg_match('/-{3}\n([\S\s]+)\n-{3}\n/', $content, $match);
    return $match[1];
  }
}