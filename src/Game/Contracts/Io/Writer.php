<?php

namespace BinaryStudioAcademy\Game\Contracts\Io;

interface Writer
{
    public function write(string $string): void;
    public function writeln(string $string): void;

    /**
     * @return resource
     */
    public function getStream();
}
