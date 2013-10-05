<?php

namespace Stencil;

// Get the core
require STENCIL_DIR.'stencil.php';

// Include namespaces
use Commando\Command as Command;

class CLI {
  private $stencil;
  function __construct() {
    $this->stencil = new Stencil();
    $this->initCLI();
  }

  /**
   * Initialize Commando
   */
  function initCLI() {
    $hello_cmd = new Command();

    $hello_cmd->option('b')
      ->aka('build')
      ->describedAs('Build site')
      ->map(function() {
        $this->stencil->buildSite();
      });
  }
}