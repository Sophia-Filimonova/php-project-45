<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_AMOUNT = 3;

function runGame(string $rules, callable $generateQuestion)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?', false, ' ');
    line("Hello, %s!", $name);
    line($rules);
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
            break;
        }
    }
    if ($i === ROUNDS_AMOUNT + 1) {
        line("Congratulations, {$name}!");
    }
}
