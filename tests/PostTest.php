<?php

require_once __DIR__.'/../paths.php';
require_once VENDOR_DIR.'autoload.php';
require_once STENCIL_DIR.'post.php';

use Stencil\Stencil as Stencil;
use Stencil\Post as Post;

class PostTest extends PHPUnit_Framework_TestCase
{
  public function testClassConstruct()
  {
    $post = new Post();

    $this->assertEquals($post->title, '');
    $this->assertEquals($post->date, time());
    $this->assertEquals($post->layout, '');
    $this->assertEquals($post->content, '');
  }
}