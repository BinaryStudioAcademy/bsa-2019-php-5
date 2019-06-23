<?php

namespace BinaryStudioAcademy\Game\Contracts\Helpers;

interface Math
{
    public function luck(Random $random, int $luck): bool;

    public function damage(int $strength, int $armour): int;
}