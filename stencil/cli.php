<?php

namespace Stencil;

// Get the core
require STENCIL_DIR.'stencil.php';

// Get required libraries
require VENDOR_DIR.'nategood/commando/src/Commando/Command.php';
require VENDOR_DIR.'nategood/commando/src/Commando/Option.php';
require VENDOR_DIR.'nategood/commando/src/Commando/Util/Terminal.php';
require VENDOR_DIR.'kevinlebrun/colors.php/lib/Colors/Color.php';

// Include namespaces
use Commando\Command as Command;
use Stencil\Stencil as Stencil;

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