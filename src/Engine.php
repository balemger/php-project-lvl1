<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ITERATIONS = 3;
const MIN_VALUE = 1;
const MAX_VALUE = 100;

function welcome()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function startBrainGame($instruction, $questionAnswers)
{
    $name = welcome();
    line($instruction);

    $iterationsCount = ITERATIONS;

    for ($iteration = 0; $iteration < $iterationsCount; $iteration += 1) {
        $question = $questionAnswers[$iteration]['question'];
        $correctAnswer = $questionAnswers[$iteration]['answer'];

        $userAnswer = prompt("Question: $question");

        line("Your answer: $userAnswer");

        if ($userAnswer === $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line('Let\'s try again, %s!', $name);
            break;
        }
        if ($iteration === $iterationsCount - 1) {
            line('Congratulations, %s!', $name);
            break;
        }
    }
}
