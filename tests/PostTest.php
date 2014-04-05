<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../src/Stencil/post.php';

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

  public function testParse()
  {
    $postContent = "---\ntitle: Test Post 1\n---\n\nTest post #1.\nThis is some more sample content.";
    $post = new Post();

    $this->assertEquals($post->parse($postContent), "title: Test Post 1");
  }
}