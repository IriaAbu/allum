<?php

/**
 * *****************************************
 * VARIABLES :
 * *****************************************
 */
$allumets = ['|', '|', '|', '|', '|', '|', '|', '|', '|', '|', '|'];
$turnGamer = true;
$qte = 11;
$allum = implode('', $allumets);
echo $allum . PHP_EOL;

/**
 * *****************************************
 * BOUCLE :
 * *****************************************
 */
while ($qte != 1) {
    if ($turnGamer == true) {
        turnHuman($allum, $qte);
        $turnGamer = false;
        if ($qte == 1) {
            echo "I lost ... snif ... but I'll get you next time !!" . PHP_EOL;
        }
    } elseif ($turnGamer == false) {
        turnIA($allum, $qte);
        $turnGamer = true;
        if ($qte == 1) {
            echo 'You lost, so bad...' . PHP_EOL;
        }
    }
}

/**
 * *****************************************
 * FUNCTIONS :
 * *****************************************
 */

// tour du joueur humain
function turnHuman(&$allum, &$qte)
{
    echo 'Your turn : ' . PHP_EOL;
    $line = readline('Matches : ');
    readline_add_history($line);

    while ($line < 0 || $line == '') {
        echo 'Error : invalid input ( positive number expected )' . PHP_EOL;
        $line = readline('Matches : ');
        readline_add_history($line);
    }
    while ($line == 0) {
        echo 'Error : you have to remove at least one match' . PHP_EOL;
        $line = readline('Matches : ');
        readline_add_history($line);
    }
    while ($line > 3) {
        echo 'Error : not enough matches' .
            PHP_EOL;
        $line = readline('Matches : ');
        readline_add_history($line);
    }
    if ($line == 1 || $line == 2 || $line == 3) {
        echo "Player removed $line match(es)" . PHP_EOL;

        $qte = $qte - $line;
        $allum = substr($allum, -$qte);
        echo $allum . PHP_EOL;
    }
}

// Tour du IA
function turnIA(&$allum, &$qte)
{
    echo 'IAs turn ...' . PHP_EOL;

    // algorithmie
    switch ($qte) {
        case $qte == 2 || $qte == 6 || $qte == 10:
            $line = 1;
            break;
        case $qte == 7 || $qte == 3:
            $line = 2;
            break;
        case $qte == 8 || $qte == 4:
            $line = 3;
            break;
        case $qte == 9 || $qte == 5:
            $line = rand(1, 3);
    }

    echo "IA removed $line match(es)" . PHP_EOL;
    $qte = $qte - $line;
    $allum = substr($allum, -$qte);
    echo $allum . PHP_EOL;
}
