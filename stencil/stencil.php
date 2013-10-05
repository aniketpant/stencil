<?php

/**
 * Stencil
 * A static site generator written in PHP
 *
 * @author  Aniket Pant <me@aniketpant.com>
 */

namespace Stencil;

// Include namespaces
use Jasny\Config;

class Stencil {
  private $config;

  function __construct() {
    $this->config = Config::i()->load(CONFIG_FILE);
  }

  /**
   * Build the website
   * @return bool Site generation status
   */
  public function build() {
    print_r($this->getPosts());
  }

  private function getPosts() {
    $filenames = array();
    foreach (glob(POSTS_DIR.'*.md') as $filename) {
      array_push($filenames, $filename);
    }
    return $filenames;
  }

  public function serve() {

  }
}