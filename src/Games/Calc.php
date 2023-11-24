<?php

namespace BrainGames\Games\Calc;

const RULES = 'What is the result of the expression?';

function generateQuestion()
{
    $operators = ['+', '-', '*'];
    $operator = $operators[array_rand($operators)];
    $firstNumber = mt_rand(1, 50);
    $secondNumber = mt_rand(1, 50);
    $correctAnswer = '';
    switch ($operator) {
        case '+':
            $correctAnswer = $firstNumber + $secondNumber;
            break;
        case '-':
            $correctAnswer = $firstNumber - $secondNumber;
            break;
        case '*':
            $firstNumber = mt_rand(1, 25);
            $secondNumber = mt_rand(1, 10);
            $correctAnswer = $firstNumber * $secondNumber;
    }
    $question = "{$firstNumber} {$operator} {$secondNumber}";
    return [
        'correct answer' => (string) $correctAnswer,
        'question' => $question
    ];
}
