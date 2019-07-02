<?php

namespace BinaryStudioAcademy\Game\Helpers;

use BinaryStudioAcademy\Game\Contracts\Helpers\Math as IMath;
use BinaryStudioAcademy\Game\Contracts\Helpers\Random;

class Math implements IMath
{
    private const DAMAGE_COEFFICIENT = 10;

    public function luck(Random $random, int $luck): bool
    {
        return ceil($random->get() * Stats::MAX_LUCK) > (Stats::MAX_LUCK - $luck);
    }

    public function damage(int $strength, int $armour): int
    {
        return ceil(self::DAMAGE_COEFFICIENT * $strength / $armour);
    }
}
