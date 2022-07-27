<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\iteration;
use function BrainGames\Engine\startGame;

function start()
{
    $name = startGame('What is the result of the expression?');
    iteration($name, 'calc');
}

