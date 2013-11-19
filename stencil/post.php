<?php

namespace Stencil;

class Post {
  public $title;

  function __construct($title = '', $date = '', $layout = '', $content = '') {
    $this->title = $title;
  }
}