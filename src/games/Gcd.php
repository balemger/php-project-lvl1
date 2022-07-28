<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\gameProgress;
use function BrainGames\Engine\getIterationsCount;
use function BrainGames\Engine\startGame;

function startBrainGcd()
{
    $instruction = 'Find the greatest common divisor of given numbers.';
    $name = startGame($instruction);
    $iterationsCount = getIterationsCount();

    for ($iteration = 0; $iteration < $iterationsCount; $iteration += 1) {
        $task = getRandomPare();
        $question = $task['question'];
        $correctAnswer = getGcd($task['num1'], $task['num2']);

        if (gameProgress($question, $correctAnswer, $name, $iteration, $iterationsCount) !== true) {
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
