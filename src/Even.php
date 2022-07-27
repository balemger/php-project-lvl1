<?php

namespace BrainGames\Even;

use function BrainGames\Cli\welcome;
use function cli\line;
use function cli\prompt;

function start()
{
    $name = welcome();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    iteration($name);
}

function iteration($name)
{
    $iteration = 0;
    while (question($name) === true) {
        $iteration += 1;
        if ($iteration === 3) {
            line('Congratulations,, %s!', $name);
            break;
        }
    }
}

function question($name)
{
    $randomNumber = rand(2, 99);
    $answer = prompt('Question: %s', $randomNumber);
    line('Your answer: %s', $answer);
    $correctAnswer = getCorrectAnswer($randomNumber);
    if ($answer === $correctAnswer) {
        line('Correct!');
        return true;
    } else {
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
        line('Let\'s try again, %s!', $name);
        return false;
    }
}

function isEven($number)
{
    return $number % 2 === 0;
}

function getCorrectAnswer($number)
{
    if (isEven($number)) {
        return "yes";
    }
    return "no";
}
