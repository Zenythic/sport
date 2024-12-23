<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BettingController extends Controller
{
    public function show()
    {
        $matches = [
            [
                'league' => 'España > La Liga 2',
                'date' => 'En Vivo',
                'time' => '45\' 1ª parte',
                'teams' => [
                    [
                        'name' => 'Luton Town',
                        'bets' => [
                            '1x2' => [
                                '1' => 1,
                                'empate' => 11.00,
                                '2' => 2,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.07,
                                'empate o 2' => 11.00,
                                '1 o 2' => 2,
                            ],
                            'total' => [
                                'más de 3.0' => 2.90,
                                'menos de 3.0' => 2.90,
                                'más de 3.5' => 2.90,
                                'menos de 3.5' => 2.90,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Everton',
                        'bets' => [
                            '1x2' => [
                                '1' => 1.07,
                                'empate' => 11.00,
                                '2' => 2,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.07,
                                'empate o 2' => 11.00,
                                '1 o 2' => 2.90,
                            ],
                            'total' => [
                                'más de 3.0' => 2.90,
                                'menos de 3.0' => 2.90,
                                'más de 3.5' => 2.90,
                                'menos de 3.5' => 2.90,
                            ],
                        ],
                    ],
                ],
            ],
            // Partido 2
            [
                'league' => 'Inglaterra > Premier League',
                'date' => 'En Vivo',
                'time' => '60\' 2ª parte',
                'teams' => [
                    [
                        'name' => 'Manchester United',
                        'bets' => [
                            '1x2' => [
                                '1' => 1.20,
                                'empate' => 6.50,
                                '2' => 4.30,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.02,
                                'empate o 2' => 3.80,
                                '1 o 2' => 1.80,
                            ],
                            'total' => [
                                'más de 3.0' => 2.90,
                                'menos de 3.0' => 2.90,
                                'más de 3.5' => 2.90,
                                'menos de 3.5' => 2.90,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Chelsea',
                        'bets' => [
                            '1x2' => [
                                '1' => 2.00,
                                'empate' => 3.50,
                                '2' => 3.10,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.45,
                                'empate o 2' => 1.80,
                                '1 o 2' => 1.25,
                            ],
                            'total' => [
                                'más de 3.0' => 2.90,
                                'menos de 3.0' => 2.90,
                                'más de 3.5' => 2.90,
                                'menos de 3.5' => 2.90,
                            ],
                        ],
                    ],
                ],
            ],
            // Partido 3
            [
                'league' => 'Italia > Serie A',
                'date' => 'En Vivo',
                'time' => '30\' 1ª parte',
                'teams' => [
                    [
                        'name' => 'AC Milan',
                        'bets' => [
                            '1x2' => [
                                '1' => 1.85,
                                'empate' => 3.60,
                                '2' => 4.10,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.10,
                                'empate o 2' => 2.30,
                                '1 o 2' => 1.50,
                            ],
                            'total' => [
                                'más de 3.0' => 2.90,
                                'menos de 3.0' => 2.90,
                                'más de 3.5' => 2.90,
                                'menos de 3.5' => 2.90,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Juventus',
                        'bets' => [
                            '1x2' => [
                                '1' => 3.20,
                                'empate' => 3.40,
                                '2' => 2.40,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.25,
                                'empate o 2' => 1.70,
                                '1 o 2' => 1.90,
                            ],
                            'total' => [
                                'más de 3.0' => 2.90,
                                'menos de 3.0' => 2.90,
                                'más de 3.5' => 2.90,
                                'menos de 3.5' => 2.90,
                            ],
                        ],
                    ],
                ],
            ],
            // Partido 4
            [
                'league' => 'Francia > Ligue 1',
                'date' => 'En Vivo',
                'time' => '75\' 2ª parte',
                'teams' => [
                    [
                        'name' => 'PSG',
                        'bets' => [
                            '1x2' => [
                                '1' => 1.40,
                                'empate' => 4.60,
                                '2' => 5.50,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.05,
                                'empate o 2' => 3.20,
                                '1 o 2' => 1.70,
                            ],
                            'total' => [
                                'más de 3.0' => 2.90,
                                'menos de 3.0' => 2.90,
                                'más de 3.5' => 2.90,
                                'menos de 3.5' => 2.90,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Marseille',
                        'bets' => [
                            '1x2' => [
                                '1' => 2.80,
                                'empate' => 3.10,
                                '2' => 2.90,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.35,
                                'empate o 2' => 1.80,
                                '1 o 2' => 1.60,
                            ],
                            'total' => [
                                'más de 3.0' => 2.90,
                                'menos de 3.0' => 2.90,
                                'más de 3.5' => 2.90,
                                'menos de 3.5' => 2.90,
                            ],
                        ],
                    ],
                ],
            ],
            // Partido 5
            [
                'league' => 'Alemania > Bundesliga',
                'date' => 'En Vivo',
                'time' => '60\' 1ª parte',
                'teams' => [
                    [
                        'name' => 'Bayern Munich',
                        'bets' => [
                            '1x2' => [
                                '1' => 1.50,
                                'empate' => 4.20,
                                '2' => 6.00,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.10,
                                'empate o 2' => 3.60,
                                '1 o 2' => 1.80,
                            ],
                            'total' => [
                                'más de 3.0' => 2.90,
                                'menos de 3.0' => 2.90,
                                'más de 3.5' => 2.90,
                                'menos de 3.5' => 2.90,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Borussia Dortmund',
                        'bets' => [
                            '1x2' => [
                                '1' => 2.10,
                                'empate' => 3.40,
                                '2' => 3.80,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.30,
                                'empate o 2' => 1.85,
                                '1 o 2' => 1.50,
                            ],
                            'total' => [
                                'más de 3.0' => 2.90,
                                'menos de 3.0' => 2.90,
                                'más de 3.5' => 2.90,
                                'menos de 3.5' => 2.90,
                            ],
                        ],
                    ],
                ],
            ],
            // Partido 6
            [
                'league' => 'Portugal > Primeira Liga',
                'date' => 'En Vivo',
                'time' => '15\' 1ª parte',
                'teams' => [
                    [
                        'name' => 'Benfica',
                        'bets' => [
                            '1x2' => [
                                '1' => 1.60,
                                'empate' => 3.40,
                                '2' => 5.00,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.10,
                                'empate o 2' => 3.40,
                                '1 o 2' => 1.60,
                            ],
                            'total' => [
                                'más de 3.0' => 2.90,
                                'menos de 3.0' => 2.90,
                                'más de 3.5' => 2.90,
                                'menos de 3.5' => 2.90,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Portimonense',
                        'bets' => [
                            '1x2' => [
                                '1' => 2.50,
                                'empate' => 3.30,
                                '2' => 3.00,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.20,
                                'empate o 2' => 2.80,
                                '1 o 2' => 1.75,
                            ],
                            'total' => [
                                'más de 3.0' => 2.90,
                                'menos de 3.0' => 2.90,
                                'más de 3.5' => 2.90,
                                'menos de 3.5' => 2.90,
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $recommendedMatches = [
            [
                'league' => 'España > La Liga 2',
                'date' => '20/May/2025',
                'teams' => [
                    [
                        'name' => 'Luton Town',
                        'bets' => [
                            '1x2' => [
                                '1' => 1,
                                'empate' => 11.00,
                                '2' => 2,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.07,
                                'empate o 2' => 11.00,
                                '1 o 2' => 2,
                            ],
                            'total' => [
                                'más de 3.0' => 2.90,
                                'menos de 3.0' => 2.90,
                                'más de 3.5' => 2.90,
                                'menos de 3.5' => 2.90,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Everton',
                        'bets' => [
                            '1x2' => [
                                '1' => 1.07,
                                'empate' => 11.00,
                                '2' => 2,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.07,
                                'empate o 2' => 11.00,
                                '1 o 2' => 2.90,
                            ],
                            'total' => [
                                'más de 3.0' => 2.90,
                                'menos de 3.0' => 2.90,
                                'más de 3.5' => 2.90,
                                'menos de 3.5' => 2.90,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'league' => 'Inglaterra > Premier League',
                'date' => '20/May/2025',
                'teams' => [
                    [
                        'name' => 'Manchester United',
                        'bets' => [
                            '1x2' => [
                                '1' => 1.20,
                                'empate' => 6.50,
                                '2' => 4.30,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.02,
                                'empate o 2' => 3.80,
                                '1 o 2' => 1.80,
                            ],
                            'total' => [
                                'más de 3.0' => 2.90,
                                'menos de 3.0' => 2.90,
                                'más de 3.5' => 2.90,
                                'menos de 3.5' => 2.90,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Chelsea',
                        'bets' => [
                            '1x2' => [
                                '1' => 2.00,
                                'empate' => 3.50,
                                '2' => 3.10,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.45,
                                'empate o 2' => 1.80,
                                '1 o 2' => 1.25,
                            ],
                            'total' => [
                                'más de 3.0' => 2.90,
                                'menos de 3.0' => 2.90,
                                'más de 3.5' => 2.90,
                                'menos de 3.5' => 2.90,
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $upcomingMatches = [
            [
                'league' => 'Francia > Ligue 1',
                'date' => '22/Dec/2024',
                'teams' => [
                    [
                        'name' => 'Paris Saint-Germain',
                        'bets' => [
                            '1x2' => [
                                '1' => 1.50,
                                'empate' => 3.70,
                                '2' => 6.00,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.10,
                                'empate o 2' => 4.00,
                                '1 o 2' => 1.25,
                            ],
                            'total' => [
                                'más de 3.0' => 2.00,
                                'menos de 3.0' => 2.50,
                                'más de 3.5' => 3.00,
                                'menos de 3.5' => 2.80,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Marseille',
                        'bets' => [
                            '1x2' => [
                                '1' => 4.00,
                                'empate' => 3.50,
                                '2' => 1.80,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.75,
                                'empate o 2' => 1.35,
                                '1 o 2' => 1.50,
                            ],
                            'total' => [
                                'más de 3.0' => 2.60,
                                'menos de 3.0' => 2.30,
                                'más de 3.5' => 3.10,
                                'menos de 3.5' => 2.60,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'league' => 'Italia > Serie A',
                'date' => '23/Dec/2024',
                'teams' => [
                    [
                        'name' => 'Juventus',
                        'bets' => [
                            '1x2' => [
                                '1' => 1.75,
                                'empate' => 3.40,
                                '2' => 4.50,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.25,
                                'empate o 2' => 2.00,
                                '1 o 2' => 1.35,
                            ],
                            'total' => [
                                'más de 3.0' => 2.80,
                                'menos de 3.0' => 2.20,
                                'más de 3.5' => 3.00,
                                'menos de 3.5' => 2.70,
                            ],
                        ],
                    ],
                    [
                        'name' => 'AC Milan',
                        'bets' => [
                            '1x2' => [
                                '1' => 2.25,
                                'empate' => 3.10,
                                '2' => 3.20,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.55,
                                'empate o 2' => 1.75,
                                '1 o 2' => 1.60,
                            ],
                            'total' => [
                                'más de 3.0' => 2.90,
                                'menos de 3.0' => 2.50,
                                'más de 3.5' => 3.30,
                                'menos de 3.5' => 2.40,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'league' => 'Inglaterra > Premier League',
                'date' => '24/Dec/2024',
                'teams' => [
                    [
                        'name' => 'Liverpool',
                        'bets' => [
                            '1x2' => [
                                '1' => 1.70,
                                'empate' => 3.60,
                                '2' => 5.00,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.15,
                                'empate o 2' => 3.90,
                                '1 o 2' => 1.25,
                            ],
                            'total' => [
                                'más de 3.0' => 2.30,
                                'menos de 3.0' => 2.80,
                                'más de 3.5' => 3.10,
                                'menos de 3.5' => 2.90,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Manchester City',
                        'bets' => [
                            '1x2' => [
                                '1' => 2.00,
                                'empate' => 3.50,
                                '2' => 3.40,
                            ],
                            'doble_oportunidad' => [
                                '1 o empate' => 1.50,
                                'empate o 2' => 1.80,
                                '1 o 2' => 1.35,
                            ],
                            'total' => [
                                'más de 3.0' => 2.90,
                                'menos de 3.0' => 2.60,
                                'más de 3.5' => 3.20,
                                'menos de 3.5' => 2.60,
                            ],
                        ],
                    ],
                ],
            ],
        ];

        return view('index', compact('matches', 'recommendedMatches', 'upcomingMatches'));

    }
}
