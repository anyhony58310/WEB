<?php

class Player {
    public $level;
}

class Encounter {
    // Déclaration des constantes de classe
    const RESULT_WINNER = 1;
    const RESULT_LOSER = -1;
    const RESULT_DRAW = 0;

    public function probabilityAgainst($levelPlayerOne, $againstLevelPlayerTwo)
    {
        return 1 / (1 + (10 ** (($againstLevelPlayerTwo - $levelPlayerOne) / 400)));
    }

    public function setNewLevel(&$levelPlayerOne, $againstLevelPlayerTwo, $playerOneResult)
    {
        // Utilisation des constantes de classe avec self::
        if (!in_array($playerOneResult, [self::RESULT_WINNER, self::RESULT_LOSER, self::RESULT_DRAW])) {
            trigger_error(sprintf('Invalid result. Expected %s', implode(' or ', [self::RESULT_WINNER, self::RESULT_LOSER, self::RESULT_DRAW])));
        }

        $levelPlayerOne += (int) (32 * ($playerOneResult - $this->probabilityAgainst($levelPlayerOne, $againstLevelPlayerTwo)));
    }
}

// Exemple d'utilisation
$greg = new Player();
$jade = new Player();

$greg->level = 400;
$jade->level = 800;

$encounter = new Encounter();

echo sprintf(
    'Greg a %.2f%% chance de gagner face à Jade',
    $encounter->probabilityAgainst($greg->level, $jade->level) * 100
) . PHP_EOL;

// Imaginons que Greg l'emporte tout de même.
$encounter->setNewLevel($greg->level, $jade->level, Encounter::RESULT_WINNER);
$encounter->setNewLevel($jade->level, $greg->level, Encounter::RESULT_LOSER);

echo sprintf(
    'Les niveaux des joueurs ont évolué vers %s pour Greg et %s pour Jade',
    $greg->level,
    $jade->level
);

exit(0);
