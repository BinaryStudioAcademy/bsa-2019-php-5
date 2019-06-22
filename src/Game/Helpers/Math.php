<?php

namespace BinaryStudioAcademy\Game\Helpers;

use BinaryStudioAcademy\Game\Contracts\Math as IMath;

class Math implements IMath
{
    const DAMAGE_COEFFICIENT = 10;

    public function luck(Random $random, int $luck): bool
    {
        return ceil($random->get() * Stats::MAX_LUCK) > (Stats::MAX_LUCK - $luck);
    }

    public function damage(int $strength, int $armour): int
    {
        return self::DAMAGE_COEFFICIENT * ($strength / $armour);
    }
}
