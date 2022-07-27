<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\getIterationsCount;
use function BrainGames\Engine\printContinueMessage;
use function BrainGames\Engine\printLoseMessage;
use function BrainGames\Engine\printQuestion;
use function BrainGames\Engine\printUserAnswer;
use function BrainGames\Engine\printWinMessage;
use function BrainGames\Engine\startGame;

function start()
{
    $name = startGame('Find the greatest common divisor of given numbers.');
    $iterationsCount = getIterationsCount();

    for ($iteration = 0; $iteration < $iterationsCount; $iteration += 1) {
        $task = getRandomPare();
        $correctAnswer = getGcd($task['num1'], $task['num2']);

        $userAnswer = printQuestion($task['question']);
        printUserAnswer($userAnswer);

        if ($userAnswer === $correctAnswer) {
            printContinueMessage();
        } else {
            printLoseMessage($name, $userAnswer, $correctAnswer);
            break;
        }
        if ($iteration === $iterationsCount - 1) {
            printWinMessage($name);
            break;
        }
    }
}

function getRandomPare()
{
    $result = [];
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);

    $result['question'] = "{$num1} {$num2}";
    $result['num1'] = $num1;
    $result['num2'] = $num2;

    return $result;
}

function getGcd($num1, $num2)
{
    return (string) (gmp_gcd($num1, $num2));
}

