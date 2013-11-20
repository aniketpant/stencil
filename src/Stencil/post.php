<?php

namespace Stencil;

class Post {
  public $title;

  function __construct($title = '', $date = '', $layout = '', $content = '')
  {
    $this->title = $title;
    $this->layout = $layout;
    $this->content = $content;
    $this->date = time($date);
  }

  public function parse($content) {
    $meta = $this->getYamlData($content);
    return $meta;
  }

  private function getYamlData($content) {
    $match = preg_split("/(\n*)(-{3})(\n*)/", $content);
    return $match;
  }
}