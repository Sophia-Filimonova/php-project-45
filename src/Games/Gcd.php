<?php

namespace BrainGames\Games\Gcd;

const RULES = 'Find the greatest common divisor of given numbers.';

function gcd(int $number1, int $number2)
{
    while ($number1 !== $number2) {
        if ($number1 > $number2) {
            $number1 = $number1 - $number2;
        } else {
            $number2 = $number2 - $number1;
        }
    }
    return $number1;
}

function generateQuestion()
{
    $number1 = mt_rand(2, 50);
    $number2 = mt_rand(2, 50);
    $correctAnswer = gcd($number1, $number2);
    $question = "{$number1} {$number2}";
    return [
        'correct answer' => (string) $correctAnswer,
        'question' => $question
    ];
}
