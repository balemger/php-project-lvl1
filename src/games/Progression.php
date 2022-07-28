<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\startBrainGame;

use const BrainGames\Engine\ITERATIONS;
use const BrainGames\Engine\MIN_VALUE;
use const BrainGames\Engine\MAX_VALUE;

const INSTRUCTION = 'What number is missing in the progression?';
const MIN_ELEMENTS_COUNT = 5;
const MAX_ELEMENTS_COUNT = 10;
const MIN_ELEMENTS_INTERVAL = 2;
const MAX_ELEMENTS_INTERVAL = 5;
const MIN_START_ELEMENT = 0;

function startBrainProgression()
{
    $questionAnswers = [];
    for ($i = 0; $i < ITERATIONS; $i += 1) {
        $task = getRandomProgression();
        $question = trim($task['question']);
        $correctAnswer = $task['answer'];
        $questionAnswers[$i]['question'] = $question;
        $questionAnswers[$i]['answer'] = $correctAnswer;
    }
    startBrainGame(INSTRUCTION, $questionAnswers);
}

function getRandomProgression()
{
    $result = [];
    $interval = rand(MIN_ELEMENTS_INTERVAL, MAX_ELEMENTS_INTERVAL);
    $count = rand(MIN_ELEMENTS_COUNT, MAX_ELEMENTS_COUNT);
    $hiddenElement = rand(MIN_START_ELEMENT, $count - 1);
    $start = rand(MIN_VALUE, MAX_VALUE);
    $result['question'] = '';
    $result['elements'] = [];

    for ($i = 0; $i < $count; $i += 1) {
        $result['elements'][$i] = $i == 0 ? $start : $result['elements'][$i - 1] + $interval;
        if ($i == $hiddenElement) {
            $result['question'] .= ' ..';
            $result['answer'] = (string) ($result['elements'][$i]);
        } else {
            $result['question']  .= " {$result['elements'][$i]}";
        }
    }
    return $result;
}
