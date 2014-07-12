<?php

namespace Stencil\Tests;

use Stencil\Stencil;

class StencilTest extends \PHPUnit_Framework_TestCase
{
    public function testVersion()
    {
        $stencil = new Stencil(__DIR__.'/testConfig.json');

        $this->assertEquals($stencil->version(), VERSION);
    }
}
