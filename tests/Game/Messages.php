<?php

namespace BinaryStudioAcademyTests\Game;

class Messages
{
    const SHIPS = [
        'schooner' => [
            'name' => 'Royal Patrool Schooner',
            'stats' => [
                'strength' => 4,
                'armour' => 4,
                'luck' => 4,
                'health' => 50,
            ]
        ],
        'battle' => [
            'name' => 'Royal Battle Ship',
            'stats' => [
                'strength' => 8,
                'armour' => 8,
                'luck' => 7,
                'health' => 80,
            ]
        ],
        'royal' => [
            'name' => 'HMS Royal Sovereign',
            'stats' => [
                'strength' => 10,
                'armour' => 10,
                'luck' => 10,
                'health' => 100,
            ]
        ]
    ];
    const HARBORS = [
        1 => [
            'name' => 'Pirates Hardbor',
            'ship' => 'player'
        ],
        2 => [
            'harbor' => 'Southhampton',
            'ship' => 'schooner'
        ],
        3 => [
            'harbor' => 'Fishguard',
            'ship' => 'schooner'
        ],
        4 => [
            'harbor' => 'Salt End',
            'ship' => 'schooner'
        ],
        5 => [
            'harbor' => 'Isle of Grain',
            'ship' => 'schooner'
        ],
        6 => [
            'harbor' => 'Grays',
            'ship' => 'battle'
        ],
        7 => [
            'harbor' => 'Felixstowe',
            'ship' => 'battle'
        ],
        8 => [
            'harbor' => 'London Docks',
            'ship' => 'royal'
        ]
    ];

    static public function stats($data) {
        return 'Ship stats:' . PHP_EOL
        . 'strength: ' . ($data['strength'] ?: 4) . PHP_EOL
        . 'armour: ' . ($data['armour'] ?: 4) . PHP_EOL
        . 'luck: ' . ($data['luck'] ?: 4)  . PHP_EOL
        . 'health: ' . ($data['health'] ?: 60)   . PHP_EOL
        . 'hold: ' . ($data['hold'] ?: '[ _ _ _ ]') . PHP_EOL;
    }

    static public function harbor(int $harborNumber)
    {
        $harbor = self::HARBORS[$harborNumber];
        $ship = self::SHIPS[$harbor['ship']];

        return "Harbor {$harborNumber}: {$harbor['harbor']}." . PHP_EOL
        . "You see {$ship['name']}: " . PHP_EOL
        . 'strength: ' . $ship['stats']['strength'] . PHP_EOL
        . 'armour: ' . $ship['stats']['armour'] . PHP_EOL
        . 'luck: ' . $ship['stats']['luck']  . PHP_EOL
        . 'health: ' . $ship['stats']['health']   . PHP_EOL;
    }

    static public function fire($shipName, $playerDamage, $shipHealth, $shipDamage, $playerHealth)
    {
        return "{$shipName} has damaged on: {$playerDamage} points." . PHP_EOL
        . "health: {$shipHealth}" . PHP_EOL
        . "{$shipName} damaged your ship on: {$shipDamage} points." . PHP_EOL
        . "health: {$playerHealth}" . PHP_EOL;
    }

    static public function win($shipName)
    {
        return "{$shipName} on fire. Take it to the boarding." . PHP_EOL;
    }

    static public function aboardSchooner()
    {
        return 'You got 💰.' . PHP_EOL;
    }

    static public function aboardBattleShip()
    {
        return 'You got 🍾.' . PHP_EOL;
    }

    static public function piratesHarbor()
    {
        return 'Harbor 1: Pirates Harbor.' . PHP_EOL
        . 'Your health is repared to 60.' . PHP_EOL;
    }

    static public function piratesHarborWithGoodHealth()
    {
        return 'Harbor 1: Pirates Harbor.' . PHP_EOL;
    }

    static public function buy($skill, $nextValue)
    {
        return "You\'ve bought a {$skill}. Your {$skill} is {$nextValue}." . PHP_EOL;
    }

    static public function buyRum($nextValue)
    {
        return "You\'ve bought a rum. Your hold contains {$nextValue} bottle(s) of rum." . PHP_EOL;
    }

    static public function drink($health)
    {
        return "You\'ve drunk a rum and your health filled to {$health}";
    }

    static public function finalWin()
    {
        return '🎉🎉🎉Congratulations🎉🎉🎉' . PHP_EOL
        . '💰💰💰 All gold and rum of Great Britain belong to you! 🍾🍾🍾';
    }

    static public function whereAmI($harborNumber)
    {
        $harbor = self::HARBORS[$harborNumber];

        return "Harbor {$harborNumber}: {$harbor['harbor']}" . PHP_EOL;
    }

    static public function help()
    {
        return 'List of commands:' . PHP_EOL
        . 'help - shows this list of commands' . PHP_EOL
        . 'stats - shows stats of ship' . PHP_EOL
        . 'set-sail <east|west|north|south> - moves in given direction' . PHP_EOL
        . 'fire - attacks enemy\'s ship' . PHP_EOL
        . 'aboard - collect loot from the ship' . PHP_EOL
        . 'buy <strength|armour|luck|rum> - buys skill or rum: 1 chest of gold - 1 item' . PHP_EOL
        . 'drink - your captain drinks 1 bottle of rum and fill 30 points of health' . PHP_EOL
        . 'whereami - shows current harbor' . PHP_EOL
        . 'exit - finishes the game' . PHP_EOL;
    }

    static public function die()
    {
        return "Your ship has been sunk." . PHP_EOL
            . "You restored in the Pirate Harbor." . PHP_EOL
            . "You lost all your possessions and 1 of each stats." . PHP_EOL;
    }

    static public function errors($key)
    {
        return [
            'incorrect_direction' => 'Harbor not found in this direction',
            'pirate_harbor_aboard' => 'There is no ship to aboard',
            'pirate_harbor_fire' => 'There is no ship to fight',
            'aboard_live_ship' => 'You cannot board this ship, since it has not yet sunk.',
            'incorrect_direction_command' => "Direction 'asd' incorrect, choose from: east, west, north, south",
            'uknown_command' => "Command 'uknown_command' not found"
        ][$key];
    }
}
