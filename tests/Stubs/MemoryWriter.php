<?php

namespace BinaryStudioAcademyTests\Stubs;

use BinaryStudioAcademy\Game\Contracts\Io\Writer;

class MemoryWriter implements Writer
{
    private $stream;

    public function __construct()
    {
        $this->stream = fopen('php://memory', 'w', false);
    }

    public function write(string $string)
    {
        fputs($this->stream, $string);
    }

    public function writeln(string $string)
    {
        fputs($this->stream, $string . PHP_EOL);
    }

    public function getStream()
    {
        return $this->stream;
    }
}
