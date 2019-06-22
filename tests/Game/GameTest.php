<?php

namespace BinaryStudioAcademyTests\Game;

use PHPUnit\Framework\TestCase;
use BinaryStudioAcademy\Game\Game;
use BinaryStudioAcademyTests\Stubs\StableRandom;
use BinaryStudioAcademyTests\Game\GameTester;
use BinaryStudioAcademyTests\Game\Messages;

class GameTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function test_game(float $probability, array $commands)
    {
        $game = new Game(
            new StableRandom(1.0)
        );
        $gameTester = new GameTester($game);

        foreach ($commands as [ $command, $expectedOutput]) {
            $output = $gameTester->run($command);
            
            $this->assertContains($output, $expectedOutput);
        }
    }

    public function additionProvider()
    {
        return [
            'basic commands' => [
                1.0, 
                [
                    [
                        'help',
                        Messages::help()
                    ],
                    [
                        'stats', Messages::stats([
                            'strength' => 4,
                            'armour' => 4,
                            'luck' => 4,
                            'health' => 60,
                            'hold' => '[ _ _ _ ]'
                        ])
                    ]
                ]
            ],
            'win commands' => [
                1.0,
                $this->getWinCommands()
            ]
        ];
    }

    private function getWinCommands()
    {
        $firstBattle = [
            [
                'set-sail south', Messages::harbour(2)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    10, 40, 10, 50
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    10, 30, 10, 40    
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    10, 20, 10, 30
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    10, 10, 10, 20
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'aboard', Messages::aboardSchooner()
            ],
        ];
        $secondBattle = [
            [
                'set-sail west', Messages::harbour(3)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    12, 38, 10, 50
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    12, 26, 10, 40
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    12, 14, 10, 30
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    12, 2, 10, 20
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'aboard', Messages::aboardSchooner()
            ],
            [
                'set-sail east', Messages::piratesHarbor()
            ],
            [
                'buy strength', Messages::buy('strength', 6)
            ],
        ];
        $thirdBattle = [
            [
                'set-sail north', Messages::harbour(4)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    15, 35, 10, 50
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    15, 20, 10, 40
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    15, 5, 10, 30
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'aboard', Messages::aboardSchooner()
            ],
            [
                'set-sail south', Messages::piratesHarbor()
            ],
            [
                'buy strength', Messages::buy('strength', 7)
            ],
        ];
        $fourthBattle = [
            [
                'set-sail north', Messages::harbour(4)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    18, 32, 10, 50
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    18, 14, 10, 40
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'aboard', Messages::aboardSchooner()
            ],
            [
                'set-sail south', Messages::piratesHarbor()
            ],
            [
                'buy strength', Messages::buy('strength', 8)
            ],
        ];
        $fifthBattle = [
            [
                'set-sail south', Messages::harbour(2)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    20, 30, 10, 50
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    20, 10, 10, 40
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'aboard', Messages::aboardSchooner()
            ],
        ];
        $sixthBattle = [
            [
                'set-sail west', Messages::harbour(3)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    20, 30, 10, 30
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    20, 10, 10, 20
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'aboard', Messages::aboardSchooner()
            ],
            [
                'set-sail east', Messages::piratesHarbor()
            ],
            [
                'buy strength', Messages::buy('strength', 9)
            ],
            [
                'buy strength', Messages::buy('strength', 10)
            ],
        ];
        $seventhBattle = [
            [
                'set-sail north', Messages::harbour(4)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    25, 25, 10, 50
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'aboard', Messages::aboardSchooner()
            ],

            // west
            [
                'set-sail west', Messages::harbour(3)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    25, 25, 10, 40
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'aboard', Messages::aboardSchooner()
            ],

            // south
            [
                'set-sail south', Messages::harbour(2)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    25, 25, 10, 30
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'aboard', Messages::aboardSchooner()
            ],
            [
                'set-sail north', Messages::piratesHarbor()
            ],
            [
                'stats', Messages::stats([
                    'strength' => 10,
                    'armour' => 4,
                    'luck' => 4,
                    'health' => 30,
                    'hold' => '[ 💰 💰 💰 ]'
                ])
            ],
            [
                'buy armour', Messages::buy('armour', 5)
            ],
            [
                'buy armour', Messages::buy('armour', 6)
            ],
            [
                'buy armour', Messages::buy('armour', 7)
            ],
        ];
        $eightthBattle = [
            [
                'set-sail north', Messages::harbour(4)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    25, 25, 6, 54
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'aboard', Messages::aboardSchooner()
            ],

            // east
            [
                'set-sail east', Messages::harbour(5)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    25, 25, 6, 48
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'aboard', Messages::aboardSchooner()
            ],

            // west
            [
                'set-sail west', Messages::harbour(4)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    25, 25, 6, 42
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'aboard', Messages::aboardSchooner()
            ],
            [
                'set-sail south', Messages::piratesHarbor()
            ],
            [
                'buy armour', Messages::buy('armour', 8)
            ],
            [
                'buy armour', Messages::buy('armour', 9)
            ],
            [
                'buy armour', Messages::buy('armour', 10)
            ],
        ];
        $royalBattle1 = [
            // south
            [
                'set-sail south', Messages::harbour(2)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    25, 25, 4, 56
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'aboard', Messages::aboardSchooner()
            ],
            // east
            [
                'set-sail east', Messages::harbour(7)
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 67, 8, 48
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 54, 8, 40
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 41, 8, 32
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 28, 8, 24
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 15, 8, 16
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 2, 8, 8
                )
            ],
            [
                'fire', Messages::win('Royal Battle Ship')
            ],
            [
                'aboard', Messages::aboardBattleShip()
            ],
            [
                'drink', Messages::drink(38)
            ],
            // west
            [
                'set-sail west', Messages::harbour(2)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    25, 25, 4, 34
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'aboard', Messages::aboardSchooner()
            ],
            [
                'set-sail north', Messages::piratesHarbor()
            ],
            [
                'buy rum', Messages::buyRum(1)
            ],
            [
                'buy rum', Messages::buyRum(2)
            ],
            [
                'drink', Messages::drink(64)
            ],
            [
                'drink', Messages::drink(94)
            ]
        ];
        $royalBattle2 = [
            // south
            [
                'set-sail south', Messages::harbour(2)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    25, 25, 4, 90
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'aboard', Messages::aboardSchooner()
            ],
            // east
            [
                'set-sail east', Messages::harbour(7)
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 67, 8, 82
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 54, 8, 74
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 41, 8, 66
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 28, 8, 66
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 15, 8, 58
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 2, 8, 50
                )
            ],
            [
                'fire', Messages::win('Royal Battle Ship')
            ],
            [
                'aboard', Messages::aboardBattleShip()
            ],
            // west
            [
                'set-sail west', Messages::harbour(2)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    25, 25, 4, 46
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'aboard', Messages::aboardSchooner()
            ],
            [
                'set-sail north', Messages::piratesHarbor()
            ],
            [
                'buy rum', Messages::buyRum(2)
            ],
            [
                'buy rum', Messages::buyRum(3)
            ],
            [
                'drink', Messages::drink(76)
            ]
        ];
        $royalBattle3 = [
            // north
            [
                'set-sail north', Messages::harbour(4)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    25, 25, 4, 72
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            // east
            [
                'set-sail north', Messages::harbour(5)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    25, 25, 4, 68
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'drink', Messages::drink(98)
            ],
            // east
            [
                'set-sail east', Messages::harbour(6)
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 67, 8, 90
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 54, 8, 82
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 41, 8, 74
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 28, 8, 66
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 15, 8, 58
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 2, 8, 50
                )
            ],
            [
                'fire', Messages::win('Royal Battle Ship')
            ],
            [
                'aboard', Messages::aboardBattleShip()
            ],
            [
                'stats', Messages::stats([
                    'strength' => 10,
                    'armour' => 10,
                    'luck' => 4,
                    'health' => 50,
                    'hold' => '[ 🍾 🍾 _ ]'
                ])
            ],
            [
                'drink', Messages::drink(80)
            ],
            [
                'drink', Messages::drink(100)
            ],
            [
                'stats', Messages::stats([
                    'strength' => 10,
                    'armour' => 10,
                    'luck' => 4,
                    'health' => 100,
                    'hold' => '[ _ _ _ ]'
                ])
            ],
        ];
        $finalBattle = [
            // north
            [
                'set-sail south', Messages::harbour(8)
            ],
            [
                'fire', Messages::fire(
                    'HMS Royal Sovereign',
                    10, 90, 10, 90
                )
            ],
            [
                'fire', Messages::fire(
                    'HMS Royal Sovereign',
                    10, 80, 10, 80
                )
            ],
            [
                'fire', Messages::fire(
                    'HMS Royal Sovereign',
                    10, 70, 10, 70
                )
            ],
            [
                'fire', Messages::fire(
                    'HMS Royal Sovereign',
                    10, 60, 10, 60
                )
            ],
            [
                'fire', Messages::fire(
                    'HMS Royal Sovereign',
                    10, 50, 10, 50
                )
            ],
            [
                'fire', Messages::fire(
                    'HMS Royal Sovereign',
                    10, 40, 10, 40
                )
            ],
            [
                'fire', Messages::fire(
                    'HMS Royal Sovereign',
                    10, 30, 10, 30
                )
            ],
            [
                'fire', Messages::fire(
                    'HMS Royal Sovereign',
                    10, 20, 10, 20
                )
            ],
            [
                'fire', Messages::fire(
                    'HMS Royal Sovereign',
                    10, 10, 10, 10
                )
            ],
            [
                'fire', Messages::finalWin()
            ],
        ];

        return array_merge([
                [
                    'stats', Messages::stats([
                        'strength' => 4,
                        'armour' => 4,
                        'luck' => 4,
                        'health' => 60,
                        'hold' => '[ _ _ _ ]'
                    ])
                ],
            ],
            // south
            $firstBattle,
            [
                [
                    'stats', Messages::stats([
                        'strength' => 4,
                        'armour' => 4,
                        'luck' => 4,
                        'health' => 20,
                        'hold' => '[ 💰 _ _ ]'
                    ])
                ],
                [
                    'set-sail north', Messages::piratesHarbor()
                ],
                [
                    'buy strength', Messages::buy('strength', 5)
                ],
                [
                    'stats', Messages::stats([
                        'strength' => 5,
                        'armour' => 4,
                        'luck' => 4,
                        'health' => 60,
                        'hold' => '[ _ _ _ ]'
                    ])
                ],
            ], 
            // west
            $secondBattle,
            // north
            $thirdBattle,
            // north
            $fourthBattle,
            // south
            $fifthBattle,
            // west
            $sixthBattle,
            // north
            $seventhBattle,
            // north
            $eightthBattle,
            $royalBattle1,
            $royalBattle2,
            $royalBattle3,
            $finalBattle
        );
    }
}
