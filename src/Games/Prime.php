<?php

namespace BrainGames\Games\Prime;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number)
{
    if ($number < 2) {
        return false;
    }
    for ($divider = 2, $sqrt = sqrt($number); $divider <= $sqrt; $divider++) {
        if ($number % $divider === 0) {
            return false;
        }
    }
    return true;
}

function generateQuestion()
{
    $randomNumber = mt_rand(2, 100);
    $correctAnswer = isPrime($randomNumber) ? 'yes' : 'no';
    return [
        'correct answer' => $correctAnswer,
        'question' => (string) $randomNumber
    ];
}
