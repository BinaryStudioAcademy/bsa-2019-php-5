<?php

namespace BinaryStudioAcademy\Game\Io;

use BinaryStudioAcademy\Game\Contracts\Io\Reader;

class CliReader implements Reader
{
    private $stream;

    public function __construct()
    {
        $this->stream = STDIN;
    }

    public function read(): string
    {
        return fgets($this->stream);
    }

    public function getStream()
    {
        return $this->stream;
    }
}
