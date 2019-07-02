<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Contracts\Io\Reader;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Contracts\Helpers\Random;

class Game
{
    private $random;

    public function __construct(Random $random)
    {
        $this->random = $random;
    }

    public function start(Reader $reader, Writer $writer)
    {
        $writer->writeln('Your task is to develop a game "Battle Ship".');
        $writer->writeln('This method starts infinite loop with game logic.');
        $writer->writeln('Use proposed implementation in order to tests work correct.');
        $writer->writeln('Random float number: ' . $this->random->get());
        $writer->writeln('Feel free to remove this lines and write yours instead.');
        $writer->writeln('Press enter to start... ');
        $input = trim($reader->read());
        $writer->writeln('Adventure has begun. Wish you good luck!');
    }

    public function run(Reader $reader, Writer $writer)
    {
        $writer->writeln('This method runs program step by step.');
    }
}
