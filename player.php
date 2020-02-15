<?php
require_once ('RoundChecker.php');
require_once ('Hand.php');
require_once ('CardCombinationHandler.php');

class Player
{
    const VERSION = "Default PHP folding player";
    private $roundChecker;
    private $ownPlayer;
    public function __construct()
    {
        $this->roundChecker = new RoundChecker();
    }

    public function betRequest($game_state)
    {

        $this->ownPlayer=$game_state->players[$game_state->in_action];

        $cards=array_merge($this->ownPlayer->hole_cards,$game_state->community_cards);
        $hand = new Hand($cards);

        $next=$hand->checkHand();
        $bid=($game_state->current_buy_in - $this->ownPlayer->bet)*$next;
        if($bid>=$this->ownPlayer->stack){
            $bid=$this->ownPlayer->stack;
        }

        return  (int)round($bid);

    }

    public function showdown($game_state)
    {
    }
}
