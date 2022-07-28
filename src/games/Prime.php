<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\startBrainGame;

use const BrainGames\Engine\ITERATIONS;
use const BrainGames\Engine\MAX_VALUE;
use const BrainGames\Engine\MIN_VALUE;

const INSTRUCTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function startBrainPrime()
{
    $questionAnswers = [];
    for ($i = 0; $i < ITERATIONS; $i += 1) {
        $question = rand(MIN_VALUE, MAX_VALUE);
        $questionAnswers[$i]['question'] = $question;
        $questionAnswers[$i]['answer'] = isPrime($question) === true ? 'yes' : 'no';
    }
    startBrainGame(INSTRUCTION, $questionAnswers);
}


function isPrime(int $num)
{
    if ($num == 1) {
        return false;
    }
    $bCheck = true;
    $highestIntegralSquareRoot = floor(sqrt($num));
    for ($i = 2; $i <= $highestIntegralSquareRoot; $i++) {
        if ($num % $i == 0) {
            $bCheck = false;
            break;
        }
    }
    return $bCheck;
}
