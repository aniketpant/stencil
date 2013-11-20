<?php

namespace Stencil;

// Get the core
require __DIR__.'/stencil.php';

// Include namespaces
use Commando\Command as Command;

class CLI {
  private $stencil;

  function __construct()
  {
    $this->stencil = new Stencil();
    $this->initCLI();
  }

  /**
   * Initialize Commando
   */
  function initCLI()
  {
    $hello_cmd = new Command();

    $hello_cmd->option('b')
      ->aka('build')
      ->describedAs('Build site')
      ->map(function() {
        $this->stencil->build();
      });

    $hello_cmd->option('s')
      ->aka('serve')
      ->describedAs('Serve site')
      ->map(function() {
        $this->stencil->serve();
      });

    $hello_cmd->option('v')
      ->aka('version')
      ->describedAs('Show version')
      ->map(function() {
        echo 'Stencil ' . $this->stencil->version() . PHP_EOL;
      });
  }
}