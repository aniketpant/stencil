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
  public function buildSite() {
    print_r($this->config->name);
  }
}