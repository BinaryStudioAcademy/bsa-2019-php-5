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
            
            $this->assertStringContainsString(trim($expectedOutput), trim($output));
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
            ],
            'walk through map' => [
                1.0,
                [
                    [ 'set-sail south', Messages::harbor(2) ],
                    [ 'whereami', Messages::whereAmI(2) ],
                    [ 'set-sail west', Messages::harbor(3) ],
                    [ 'whereami', Messages::whereAmI(3) ],
                    [ 'set-sail north', Messages::whereAmI(4) ],
                    [ 'whereami', Messages::whereAmI(4) ],
                    [ 'set-sail east', Messages::harbor(5) ],
                    [ 'whereami', Messages::whereAmI(5) ],
                    [ 'set-sail east', Messages::harbor(6) ],
                    [ 'whereami', Messages::whereAmI(6) ],
                    [ 'set-sail south', Messages::harbor(8) ],
                    [ 'whereami', Messages::whereAmI(8) ],
                    [ 'set-sail west', Messages::harbor(7) ],
                    [ 'whereami', Messages::whereAmI(7) ],
                    [ 'set-sail west', Messages::harbor(2) ],
                    [ 'whereami', Messages::whereAmI(2) ],
                    [ 'set-sail north', Messages::piratesHarborWithGoodHealth() ],
                    [ 'whereami', Messages::whereAmI(1) ],
                ]
            ]
        ];
    }

    private function getWinCommands()
    {
        $firstBattle = [
            [
                'set-sail south', Messages::harbor(2)
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
                'set-sail west', Messages::harbor(3)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    13, 37, 10, 50
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    13, 24, 10, 40
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    13, 11, 10, 30
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
                'set-sail north', Messages::harbor(4)
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
                'set-sail north', Messages::harbor(4)
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
                'set-sail south', Messages::harbor(2)
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
                'set-sail west', Messages::harbor(3)
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
                'set-sail north', Messages::harbor(4)
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
                'set-sail west', Messages::harbor(3)
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
                'set-sail south', Messages::harbor(2)
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
                    'health' => 60,
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
                'set-sail north', Messages::harbor(4)
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
                'set-sail east', Messages::harbor(5)
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
                'set-sail west', Messages::harbor(4)
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
                'set-sail south', Messages::harbor(2)
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
                'set-sail east', Messages::harbor(7)
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
                'set-sail west', Messages::harbor(2)
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
                'drink', Messages::drink(90)
            ]
        ];
        $royalBattle2 = [
            // south
            [
                'set-sail south', Messages::harbor(2)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    25, 25, 4, 86
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
                'set-sail east', Messages::harbor(7)
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 67, 8, 78
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 54, 8, 70
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 41, 8, 62
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 28, 8, 54
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 15, 8, 46
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 2, 8, 38
                )
            ],
            [
                'fire', Messages::win('Royal Battle Ship')
            ],
            [
                'aboard', Messages::aboardBattleShip()
            ],
            [
                'drink', Messages::drink(68)
            ],
            // west
            [
                'set-sail west', Messages::harbor(2)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    25, 25, 4, 64
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'aboard', Messages::aboardSchooner()
            ],
            [
                'set-sail north', Messages::piratesHarborWithGoodHealth()
            ],
            [
                'buy rum', Messages::buyRum(2)
            ],
            [
                'buy rum', Messages::buyRum(3)
            ],
            [
                'drink', Messages::drink(94)
            ]
        ];
        $royalBattle3 = [
            // north
            [
                'set-sail north', Messages::harbor(4)
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
            // east
            [
                'set-sail east', Messages::harbor(5)
            ],
            [
                'fire', Messages::fire(
                    'Royal Patrool Schooner',
                    25, 25, 4, 86
                )
            ],
            [
                'fire', Messages::win('Royal Patrool Schooner')
            ],
            [
                'drink', Messages::drink(100)
            ],
            // east
            [
                'set-sail east', Messages::harbor(6)
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 67, 8, 92
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 54, 8, 84
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 41, 8, 76
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 28, 8, 68
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 15, 8, 60
                )
            ],
            [
                'fire', Messages::fire(
                    'Royal Battle Ship',
                    13, 2, 8, 52
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
                    'health' => 52,
                    'hold' => '[ 🍾 🍾 _ ]'
                ])
            ],
            [
                'drink', Messages::drink(82)
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
                'set-sail south', Messages::harbor(8)
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
                ]
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
