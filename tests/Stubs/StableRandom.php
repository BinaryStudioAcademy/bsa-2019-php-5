<?php

namespace BinaryStudioAcademyTests\Stubs;

use BinaryStudioAcademy\Game\Contracts\Helpers\Random;

class StableRandom implements Random
{
    private $probability;

    public function __construct(float $probability)
    {
        $this->probability = $probability;
    }

    public function get(): float
    {
        return $this->probability;
    }
}
