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
use Jasny\Config as Config;

class Stencil {
  private $_config;

  function __construct($filename)
  {
    $this->_loadConfig($filename);
  }

  /**
   * Load config file to Stencil instance
   */
  private static function _loadConfig($filename)
  {
    $_config = (new Config)->load($filename);
  }

  /**
   * Build the website
   * @return bool Site generation status
   */
  public function build()
  {
    $postnames = $this->_getPosts();

    foreach ($postnames as $key => $postname) {
      $post = new Post(file_get_contents($postname));
    }
  }

  private static function _getPosts()
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

  public static function version()
  {
    return VERSION;
  }
}