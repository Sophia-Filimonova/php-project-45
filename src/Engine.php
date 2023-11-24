<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_AMOUNT = 3;

function runGame(string $rules, callable $generateQuestion)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?', '', ' ');
    line("Hello, %s!", $name);
    line($rules);
    $victory = true;
    for ($i = 1; $i <= ROUNDS_AMOUNT; $i++) {
        [
            'correct answer' => $correctAnswer,
            'question' => $question
        ] = $generateQuestion();
        line("Question: {$question}");
        $userAnswer = prompt('Your answer');
        if ($correctAnswer === $userAnswer) {
            line('Correct!');
        } else {
            line(
                "'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'."
            );
            line("Let's try again, {$name}!");
            $victory = false;
            break;
        }
    }
    if ($victory) {
        line("Congratulations, {$name}!");
    }
}
