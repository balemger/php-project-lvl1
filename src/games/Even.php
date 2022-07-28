<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startBrainGame;

use const BrainGames\Engine\ITERATIONS;
use const BrainGames\Engine\MAX_VALUE;
use const BrainGames\Engine\MIN_VALUE;

const INSTRUCTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function startBrainEven()
{
    $questionAnswers = [];
    for ($i = 0; $i < ITERATIONS; $i += 1) {
        $question = rand(MIN_VALUE, MAX_VALUE);
        $questionAnswers[$i]['question'] = $question;
        $questionAnswers[$i]['answer'] = $question % 2 === 0 ? 'yes' : 'no';
    }
    startBrainGame(INSTRUCTION, $questionAnswers);
}
