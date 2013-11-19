<?php

namespace Stencil;

class Post {
  public $title;

  function __construct($title = '', $date = '', $layout = '', $content = '')
  {
    $this->title = $title;
    $this->layout = $layout;
    $this->content = $content;

    if ($date != '') {
      $this->date = $date;
    } else {
      $this->date = time();
    }
  }
}