<?php

namespace BrainGames\Games\Progression;

const RULES = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function generateQuestion()
{
    $progrStart = mt_rand(1, 20);
    $progrStep = mt_rand(2, 5);
    $indexMissNumber = mt_rand(0, PROGRESSION_LENGTH - 1);
    $progression = [];
    for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
        $currentNumber = $progrStart + $i * $progrStep;
        if ($i === $indexMissNumber) {
            $correctAnswer = $currentNumber;
            $progression[] = '..';
        } else {
            $progression[] = (string) $currentNumber;
        }
    }
    $question = join(' ', $progression);
    return [
        'correct answer' => (string) $correctAnswer,
        'question' => $question
    ];
}
