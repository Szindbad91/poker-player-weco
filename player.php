<?php
require_once ('RoundChecker.php');

class Player
{
    const VERSION = "Default PHP folding player";
    private $roundChecker;

    public function __construct()
    {
        $this->roundChecker = new RoundChecker();
    }

    public function betRequest($game_state)
    {

        return $game_state->current_buy_in;
    }

    public function showdown($game_state)
    {
    }
}
