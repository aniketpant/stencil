<?php

/**
 * Stencil
 * A static site generator written in PHP
 *
 * @author  Aniket Pant <me@aniketpant.com>
 */

namespace Stencil;

// Get required libraries
require VENDOR_DIR.'jasny/config/src/Jasny/Config.php';
require VENDOR_DIR.'jasny/config/src/Jasny/Config/Loader.php';
require VENDOR_DIR.'jasny/config/src/Jasny/Config/LoadFile.php';
require VENDOR_DIR.'jasny/config/src/Jasny/Config/JsonLoader.php';

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
  public function buildSite() {

  }
}