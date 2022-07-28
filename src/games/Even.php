<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\gameProgress;
use function BrainGames\Engine\getIterationsCount;
use function BrainGames\Engine\startGame;

function startBrainEven()
{
    $instruction = 'Answer "yes" if the number is even, otherwise answer "no".';
    $name = startGame($instruction);
    $iterationsCount = getIterationsCount();

    for ($iteration = 0; $iteration < $iterationsCount; $iteration += 1) {
        $task = getRandomNum();
        $question = $task['question'];
        $correctAnswer = isEven($task['num1']);

        if (gameProgress($question, $correctAnswer, $name, $iteration, $iterationsCount) !== true) {
            break;
        }
    }
}

function getRandomNum()
{
    $result = [];
    $randomNum = rand(1, 99);
    $result['question'] = $randomNum;
    $result['num1'] = $randomNum;
    return $result;
}

function isEven($num)
{
    return $num % 2 === 0 ? 'yes' : 'no';
}
