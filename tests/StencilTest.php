<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../src/Stencil/stencil.php';

use Stencil\Stencil as Stencil;

class StencilTest extends PHPUnit_Framework_TestCase
{
  public function testVersion()
  {
    $stencil = new Stencil(__DIR__.'/testConfig.json');

    $this->assertEquals($stencil->version(), VERSION);
  }
}