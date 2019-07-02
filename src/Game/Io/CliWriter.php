<?php

namespace BinaryStudioAcademy\Game\Io;

use BinaryStudioAcademy\Game\Contracts\Io\Writer;

class CliWriter implements Writer
{
    private $stream;

    public function __construct()
    {
        $this->stream = STDOUT;
    }

    public function write(string $string): void
    {
        fputs($this->stream, $string);
    }

    public function writeln(string $string): void
    {
        fputs($this->stream, $string . PHP_EOL);
    }

    public function getStream()
    {
        return $this->stream;
    }
}
