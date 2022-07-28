<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function welcome()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function startGame($startQuestion)
{
    $name = welcome();
    line($startQuestion);
    return $name;
}

function printWinMessage($name)
{
    line('Congratulations, %s!', $name);
}

function printLoseMessage($name, $userAnswer, $correctAnswer)
{
    line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
    line('Let\'s try again, %s!', $name);
}

function printContinueMessage()
{
    line('Correct!');
}

function printQuestion($question)
{
    return prompt("Question: $question");
}

function printUserAnswer($userAnswer)
{
    line("Your answer: $userAnswer");
}

function getIterationsCount()
{
    return 3;
}

function gameProgress($question, $correctAnswer, $name, $iteration, $iterationsCount)
{
    $userAnswer = printQuestion($question);
    printUserAnswer($userAnswer);

    if ($userAnswer === $correctAnswer) {
        printContinueMessage();
        if ($iteration === $iterationsCount - 1) {
            printWinMessage($name);
            return false;
        }
        return true;
    } else {
        printLoseMessage($name, $userAnswer, $correctAnswer);
    }
    return false;
}