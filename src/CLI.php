<?php

namespace Stencil;

// Get the core
require __DIR__ . '/stencil.php';

// Include namespaces
use Commando\Command as Command;

class CLI
{
    private $_stencil;

    public function __construct($filename)
    {
        $this->_stencil = new Stencil($filename);
        $this->_initCLI();
    }

    /**
     * Initialize Commando
     */
    private function _initCLI()
    {
        $hello_cmd = new Command();

        $hello_cmd->option('b')
            ->aka('build')
            ->describedAs('Build site')
            ->map(function () {
                $this->stencil->build();
            });

        $hello_cmd->option('s')
            ->aka('serve')
            ->describedAs('Serve site')
            ->map(function () {
                $this->stencil->serve();
            });

        $hello_cmd->option('v')
            ->aka('version')
            ->describedAs('Show version')
            ->map(function () {
                echo 'Stencil ' . Stencil::version() . PHP_EOL;
            });
    }
}
