<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\gameProgress;
use function BrainGames\Engine\getIterationsCount;
use function BrainGames\Engine\startGame;

function startBrainCalc()
{
    $instruction = 'What is the result of the expression?';
    $name = startGame($instruction);
    $iterationsCount = getIterationsCount();

    for ($iteration = 0; $iteration < $iterationsCount; $iteration += 1) {
        $task = getRandomTask();
        $question = $task['question'];
        $correctAnswer = calculate($task['operation'], $task['num1'], $task['num2']);

        if (gameProgress($question, $correctAnswer, $name, $iteration, $iterationsCount) !== true) {
            break;
        }
    }
}

function getRandomTask()
{
    $result = [];
    $num1 = rand(1, 50);
    $num2 = rand(1, 50);
    $operationIndex = rand(0, 2);
    $operations = ['+', '-', '*'];

    $result['question'] = "{$num1} {$operations[$operationIndex]} {$num2}";
    $result['num1'] = $num1;
    $result['num2'] = $num2;
    $result['operation'] = $operations[$operationIndex];
    return $result;
}

function calculate($operation, $num1, $num2)
{
    $result = '';
    switch ($operation) {
        case '+':
            $result = (string) ($num1 + $num2);
            break;
        case '-':
            $result = (string) ($num1 - $num2);
            break;
        case '*':
            $result = (string) ($num1 * $num2);
            break;
    }
    return $result;
}
