<?php

namespace App\Services;

class SimulationService
{
    public function __construct()
    {
    }

    public function getRandomScore(): int
    {
        return rand(1, 999);
    }

    public function simulateFinancing(array $data): object
    {
        $score = $this->getRandomScore();

        $rules = [
            1 => (object)[
                'min' => 1,
                'max' => 299,
                'description' => 'Reprovado',
                'class' => 'danger'
            ],
            2 => (object)[
                'min' => 300,
                'max' => 599,
                'description' => '70% de entrada, 30% do comprometimento da renda',
                'class' => 'secondary'
            ],
            3 => (object)[
                'min' => 600,
                'max' => 799,
                'description' => '50% de entrada, 25% do comprometimento da renda',
                'class' => 'primary'
            ],
            4 => (object)[
                'min' => 800,
                'max' => 950,
                'description' => '30% de entrada, 20% do comprometimento da renda',
                'class' => 'info'
            ],
            5 => (object)[
                'min' => 951,
                'max' => 999,
                'description' => '100% de financiamento, taxa zero.',
                'class' => 'success'
            ]
        ];

        foreach ($rules as $key => $value) {
            if ($score >= $value->min && $score <= $value->max) {
                return (object)[
                    'score' => $score,
                    'description' => $value->description,
                    'class' => $value->class
                ];
            }
        }
    }
}
