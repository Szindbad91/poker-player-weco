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
                $this->ownPlayer = $player;
            }
        }
        $hand = new Hand($this->ownPlayer->whole_cards);
      
        $next=$hand->checkHand();
        
        if($next==0){
            return $game_state->current_buy_in;
        }
        else  if($next==1){
            return $game_state->pot*2;
            
        }
        
        return 0;
      
    }

    public function showdown($game_state)
    {
    }
}
