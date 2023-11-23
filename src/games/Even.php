<?php

namespace BrainGames\Games\Even;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function generateQuestion()
{
    $randomNumber = mt_rand(1, 100);
    if ($randomNumber % 2 === 0) {
        $correctAnswer = 'yes';
    } else {
        $correctAnswer = 'no';
    }
    return [
        'correct answer' => $correctAnswer,
        'question' => $randomNumber
    ];
}
