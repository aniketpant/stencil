<?php

require_once __DIR__.'/../paths.php';
require_once VENDOR_DIR.'autoload.php';
require_once STENCIL_DIR.'stencil.php';

use Stencil\Stencil as Stencil;

class StencilTest extends PHPUnit_Framework_TestCase
{
  public function testVersion()
  {
    $stencil = new Stencil();

    $this->assertEquals($stencil->version(), VERSION);
  }
}