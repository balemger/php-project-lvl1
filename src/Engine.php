<?php

namespace BrainGames\Engine;

use function BrainGames\Games\Calc\getCorrectAnswer;
use function cli\line;
use function cli\prompt;

$name = '';
$config = [
    'userName' => $name,
    'games' => [
        'brain-even' => [
            'id' => 1,
            'regulations' => 'Answer "yes" if the number is even, otherwise answer "no".',
        ]
    ]
];

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

function iteration($name, $gameId)
{
    $iteration = 0;


    while (printQuestionAnswer($name, $gameId) === true) {
        $iteration += 1;
        if ($iteration === 3) {
            line('Congratulations, %s!', $name);
            break;
        }
    }
}

function printQuestionAnswer($name, $gameId)
{
    $questionAnswer = getQuestionAnswer($gameId);
    $question = $questionAnswer['question'];
    $correctAnswer = $questionAnswer['answer'];

    $userAnswer = prompt("Question: $question");
    line("Your answer: $userAnswer");
    if ($userAnswer === $correctAnswer) {
        line('Correct!');
        return true;
    } else {
        line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
        line('Let\'s try again, %s!', $name);
        return false;
    }
}

function getQuestionAnswer($gameId)
{
    $result = [];
    if ($gameId === 'even') {
        $result['question'] = rand(2, 99);
        if ($result['question'] % 2 === 0) {
            $result['answer'] = "yes";
        } else {
            $result['answer'] = "no";
        }
    } elseif ($gameId === 'calc') {

        $num1 = rand(1, 50);
        $num2 = rand(1, 50);
        $operationIndex = rand(0, 2);
        $operations = ['+', '-', '*'];

        $result['question'] = "{$num1} {$operations[$operationIndex]} {$num2}";
        switch ($operations[$operationIndex]) {
            case '+':
                $result['answer'] = (string) ($num1 + $num2);
                break;
            case '-':
                $result['answer'] = (string) ($num1 - $num2);
                break;
            case '*':
                $result['answer'] = (string) ($num1 * $num2);
                break;
        }

    }
    return $result;
}

