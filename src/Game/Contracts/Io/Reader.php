<?php

namespace BinaryStudioAcademy\Game\Contracts\Io;

interface Reader
{
    public function read(): string;
    public function getStream();
}
