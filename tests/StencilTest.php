<?php

require './paths.php';
require VENDOR_DIR.'autoload.php';
require STENCIL_DIR.'stencil.php';

use Stencil\Stencil as Stencil;

class StencilTest extends PHPUnit_Framework_TestCase
{
  public function testVersion()
  {
    $stencil = new Stencil();

    $this->assertEquals($stencil->version(), VERSION);
  }
}