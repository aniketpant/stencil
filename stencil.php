<?php

/**
 * Stencil
 * A static site generator written in PHP
 *
 * @author  Aniket Pant <me@aniketpant.com>
 */

namespace Stencil;

// Get all required libraries
require 'vendor/nategood/commando/src/Commando/Command.php';
require 'vendor/nategood/commando/src/Commando/Option.php';
require 'vendor/nategood/commando/src/Commando/Util/Terminal.php';
require 'vendor/kevinlebrun/colors.php/lib/Colors/Color.php';

// Include namespaces
use Commando\Command as Command;

class Stencil {
  private $config;

  function __construct() {
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
        $this->buildSite();
      });
  }

  /**
   * Build the website
   * @return bool Site generation status
   */
  private function buildSite() {
  }
}