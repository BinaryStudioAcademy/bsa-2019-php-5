<?php

namespace BinaryStudioAcademyTests\Stubs;

use BinaryStudioAcademy\Game\Contracts\Io\Reader;

class StringReader implements Reader
{
    private $command;

    public function __construct(string $command)
    {
        $this->command = $command;
    }

    public function read(): string
    {
        return $this->command;
    }

    public function getStream()
    {
        throw new \LogicException('No stream for string.');
    }
}
