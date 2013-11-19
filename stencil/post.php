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
}