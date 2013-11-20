<?php

/**
 * Stencil
 * A static site generator written in PHP
 *
 * @author  Aniket Pant <me@aniketpant.com>
 */

namespace Stencil;

require __DIR__.'/constants.php';

// Include namespaces
use Jasny\Config;

class Stencil {
  private $config;

  function __construct($filename)
  {
    $this->config = Config::i()->load($filename);
  }

  /**
   * Build the website
   * @return bool Site generation status
   */
  public function build()
  {
    $postnames = $this->getPosts();

    foreach ($postnames as $key => $postname) {
      $post = new Post(file_get_contents($postname));
    }
  }

  private function getPosts()
  {
    $filenames = array();
    foreach (glob(POSTS_DIR.'*.md') as $filename) {
      array_push($filenames, $filename);
    }
    return $filenames;
  }

  public function serve()
  {

  }

  public function version()
  {
    return VERSION;
  }
}