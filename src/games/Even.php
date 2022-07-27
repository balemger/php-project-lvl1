<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\iteration;
use function BrainGames\Engine\startGame;

function start()
{
    $name = startGame('Answer "yes" if the number is even, otherwise answer "no".');
    iteration($name, 'even');
}
