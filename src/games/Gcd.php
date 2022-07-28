<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startBrainGame;

use const BrainGames\Engine\ITERATIONS;
use const BrainGames\Engine\MIN_VALUE;
use const BrainGames\Engine\MAX_VALUE;

const INSTRUCTION = 'Find the greatest common divisor of given numbers.';

function startBrainGcd()
{
    $questionAnswers = [];
    for ($i = 0; $i < ITERATIONS; $i += 1) {
        $task = getRandomPare();
        $question = $task['question'];
        $correctAnswer = (string) getGcd($task['num1'], $task['num2']);
        $questionAnswers[$i]['question'] = $question;
        $questionAnswers[$i]['answer'] = $correctAnswer;
    }
    startBrainGame(INSTRUCTION, $questionAnswers);
}

function getRandomPare()
{
    $result = [];
    $num1 = rand(MIN_VALUE, MAX_VALUE);
    $num2 = rand(MIN_VALUE, MAX_VALUE);

    $result['question'] = "{$num1} {$num2}";
    $result['num1'] = $num1;
    $result['num2'] = $num2;

    return $result;
}

function getGcd($num1, $num2)
{
    return $num1 % $num2 === 0 ? $num2 : getGcd($num2, $num1 % $num2);
}
