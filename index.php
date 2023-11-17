<?php

class Player {
    private $level;
    public function __construct($initialLevel)
    {
        $this->level = $initialLevel;
    }

    public function getLevel()
    {
        return $this->level;
    }
    public function setLevel($newLevel)
    {
        $this->level = $newLevel;
    }
}

$greg = new Player(400);

echo sprintf('Le niveau de Greg est : %s', $greg->getLevel()) . PHP_EOL;

$greg->setLevel(450);

echo sprintf('Le nouveau niveau de Greg est : %s', $greg->getLevel()) . PHP_EOL;

exit(0);
