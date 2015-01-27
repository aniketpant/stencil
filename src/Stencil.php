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

    public function __construct($filename)
    {
        $this->_loadConfig($filename);
    }

    /**
     * Load config file to Stencil instance
     */
    private function _loadConfig($filename)
    {
        $_config = json_decode($filename, true);
    }

    /**
     * Build the website
     * @return bool Site generation status
     */
    public function build()
    {
        $postnames = $this->_getPosts();

        foreach ($postnames as $key => $postname) {
            $post = new Post(file_get_contents($postname));
        }
    }

    private function _getPosts()
    {
        $filenames = array();
        foreach (glob(POSTS_DIR.'*.md') as $filename) {
            array_push($filenames, $filename);
        }

        return $filenames;
    }

    public function serve()
    {

    }

    public static function version()
    {
        return VERSION;
    }
}
