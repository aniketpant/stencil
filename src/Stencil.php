<?php

/**
 * Stencil
 * A static site generator written in PHP
 *
 * @author  Aniket Pant <me@aniketpant.com>
 */

namespace Stencil;
require __DIR__ . '/Constants.php';

class Stencil
{
    private $_config;
    private $_filenames;
    private $_posts;

    public function __construct($filename)
    {
        $this->_loadConfig($filename);
    }

    /**
     * Load config file to Stencil instance
     */
    private function _loadConfig($filename)
    {
        $this->_config = json_decode(file_get_contents($filename), true);
    }

    /**
     * Build the website
     * @return bool Site generation status
     */
    public function build()
    {
        $this->_getFilenames($this->_config['readDir'])
             ->_getPosts($this->_filenames)
             ->_writePosts($this->_posts,$this->_config['writeDir']);
    }

    private function _getPost($filename)
    {

    }

    private function _getFilenames($readDir)
    {
        $this->_filenames = array();
        foreach (glob($readDir.'*.md') as $filename)
        {
            array_push($this->_filenames, $filename);
        }
        return $this;
    }

    private function _getPosts($filenames)
    {
        $this->_posts = array();
        foreach ($filenames as $file)
        {
            $post = new Post($file, file_get_contents($file));
            array_push($this->_posts, $post);
        }
        return $this;
    }

    private function _writePosts($posts,$writeDir)
    {
        foreach ($posts as $post)
        {
            $post->parse($post->content);
            if(is_writable($writeDir))
            {
            $file = fopen($writeDir.basename($post->title,".md").".html", 'w');
            fwrite($file, $post->body);
            } else {
                echo "fail";
            }
        }

    }

    public function serve()
    {

    }

    public static function version()
    {
        return VERSION;
    }
}