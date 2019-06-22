<?php

require __DIR__ . '/vendor/autoload.php';

$reader = new BinaryStudioAcademy\Game\Io\CliReader;
$writer = new BinaryStudioAcademy\Game\Io\CliWriter;

$game = new BinaryStudioAcademy\Game\Game();

$game->start($reader, $writer);
