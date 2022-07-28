<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\getIterationsCount;
use function BrainGames\Engine\printContinueMessage;
use function BrainGames\Engine\printLoseMessage;
use function BrainGames\Engine\printQuestion;
use function BrainGames\Engine\printUserAnswer;
use function BrainGames\Engine\printWinMessage;
use function BrainGames\Engine\startGame;

function startBrainEven()
{
    $name = startGame('Answer "yes" if the number is even, otherwise answer "no".');
    $iterationsCount = getIterationsCount();

    for ($iteration = 0; $iteration < $iterationsCount; $iteration += 1) {
        $num = getRandomNum();
        $correctAnswer = isEven($num);

        $userAnswer = printQuestion($num);
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

function getRandomNum()
{
    return rand(1, 99);
}

function isEven($num)
{
    return $num % 2 === 0 ? 'yes' : 'no';
}
