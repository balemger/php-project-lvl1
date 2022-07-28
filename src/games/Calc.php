<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\startBrainGame;

use const BrainGames\Engine\ITERATIONS;
use const BrainGames\Engine\MIN_VALUE;
use const BrainGames\Engine\MAX_VALUE;

const INSTRUCTION = 'What is the result of the expression?';
const MIN_OPERATION_COUNT = 0;
const MAX_OPERATION_COUNT = 2;

function startBrainCalc()
{
    $questionAnswers = [];
    for ($i = 0; $i < ITERATIONS; $i += 1) {
        $task = getRandomTask();
        $question = $task['question'];
        $correctAnswer = calculate($task['operation'], $task['num1'], $task['num2']);
        $questionAnswers[$i]['question'] = $question;
        $questionAnswers[$i]['answer'] = $correctAnswer;
    }
    startBrainGame(INSTRUCTION, $questionAnswers);
}

function getRandomTask()
{
    $result = [];
    $num1 = rand(MIN_VALUE, MAX_VALUE);
    $num2 = rand(MIN_VALUE, MAX_VALUE);
    $operationIndex = rand(MIN_OPERATION_COUNT, MAX_OPERATION_COUNT);
    $operations = ['+', '-', '*'];

    $result['question'] = "{$num1} {$operations[$operationIndex]} {$num2}";
    $result['num1'] = $num1;
    $result['num2'] = $num2;
    $result['operation'] = $operations[$operationIndex];
    return $result;
}

function calculate(string $operation, int $num1, int $num2)
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
