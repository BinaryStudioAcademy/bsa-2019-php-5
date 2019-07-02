<?php

namespace BinaryStudioAcademyTests\Game;

use BinaryStudioAcademy\Game\Game;
use BinaryStudioAcademyTests\Stubs\StringReader;
use BinaryStudioAcademyTests\Stubs\MemoryWriter;

final class GameTester
{
    private $game;

    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    public function run(string $input): string
    {
        $reader = new StringReader($input);
        $writer = new MemoryWriter;

        $this->game->run($reader, $writer);

        $output = $this->getOutput($writer);

        return $output;
    }

    private function getOutput(MemoryWriter $writer): string
    {
        $stream = $writer->getStream();
        rewind($stream);
        $output = stream_get_contents($stream);

        return $output;
    }
}
