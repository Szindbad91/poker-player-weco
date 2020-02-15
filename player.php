<?php
require_once ('RoundChecker.php');
require_once ('Hand.php');

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
        $ownPlayer = null;
        foreach ($game_state->players as $player) {
            if (isset($player->hole_cards) && !empty($player->hole_cards)) {
                $ownPlayer = $player;
            }
        }
        $hand = new Hand($ownPlayer->whole_cards);
        if($hand)
        return $game_state->current_buy_in * $hand->getMultiplierByHand();
    }

    public function showdown($game_state)
    {
    }
}
