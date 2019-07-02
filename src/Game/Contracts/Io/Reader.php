<?php

namespace BinaryStudioAcademy\Game\Contracts\Io;

interface Reader
{
    public function read(): string;

    /**
     * @return resource
     * @throws \Exception
     */
    public function getStream();
}
