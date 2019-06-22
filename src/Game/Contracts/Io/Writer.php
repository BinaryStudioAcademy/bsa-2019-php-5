<?php

namespace BinaryStudioAcademy\Game\Contracts\Io;

interface Writer
{
    public function write(string $string);
    public function writeln(string $string);
    public function getStream();
}
