<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Contracts\Io\Reader;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;

class Game
{
    public function start(Reader $reader, Writer $writer)
    {
        $writer->writeln('Your task is to develop a game "Battle Ship".');
        $writer->writeln('This method starts infinite loop with game logic.');
        $writer->writeln('Feel free to remove this lines and write yours instead.');
        $writer->writeln('Press enter to start...');
        $input = trim($reader->read());
        $writer->writeln('Adventure has begun. Wish you good luck =)');
    }

    public function run(Reader $reader, Writer $writer)
    {
        $writer->writeln('This method runs programm step by step');
    }
}
