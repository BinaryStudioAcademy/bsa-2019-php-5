<?php

namespace BinaryStudioAcademy\Game\Helpers;

use BinaryStudioAcademy\Game\Contracts\Helpers\Random as IRandom;

class Random implements IRandom
{
    public function get(): float
    {
        return rand() / getrandmax();
    }
}
