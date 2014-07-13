<?php

namespace Stencil\Test;

use Stencil\Stencil;
use Stencil\Post;

class PostTest extends \PHPUnit_Framework_TestCase
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
        $post->parse($postContent);
        $postMeta = $post->getPostMeta();
        $postBody = $post->getPostBody();

        $this->assertEquals($postMeta, "title: Test Post 1");
        $this->assertEquals($postBody, "Test post #1.\nThis is some more sample content.");
    }
}
