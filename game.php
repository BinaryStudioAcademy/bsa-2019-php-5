<?php

require __DIR__ . '/vendor/autoload.php';

$reader = new BinaryStudioAcademy\Game\Io\CliReader;
$writer = new BinaryStudioAcademy\Game\Io\CliWriter;
$random = new BinaryStudioAcademy\Game\Helpers\Random;

$game = new BinaryStudioAcademy\Game\Game($random);

$game->start($reader, $writer);
