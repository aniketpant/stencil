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

  public function testClassSetValues()
  {
    $post = new Post("Test title", "2013-11-19", "post", "Content for test post");

    $this->assertEquals($post->title, "Test title");
    $this->assertEquals($post->date, time("2013-11-19"));
    $this->assertEquals($post->layout, "post");
    $this->assertEquals($post->content, "Content for test post");
  }
}