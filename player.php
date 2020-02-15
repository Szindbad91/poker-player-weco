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
        $this->game_state=$game_state;
        $this->ownPlayer=$game_state->players[$game_state->in_action];

        $cards=array_merge($this->ownPlayer->hole_cards,$game_state->community_cards);
        $hand = new Hand($cards);

        $next=$hand->checkHand();
        $sum=$game_state->current_buy_in - $this->ownPlayer->bet;
        if($next>0){
            if($next==1){
                $bid=$sum;
            }
            else{
                $bid=$sum+$game_state->minimum_raise*$next;
            }

        }
        else{
            $bid=0;
        }
        if($next <= 1){
            $myPain=$this->getMyPain();
            if($this->ownPlayer->stack<$myPain){
                return 0;
            }
            if ($sum > $game_state->small_blind * 5 ) {
                return 0;
            }
        }
    
        if($bid>=$this->ownPlayer->stack){
            $bid=$this->ownPlayer->stack;
        }

        return  (int)round($bid);

    }

    public function getPlayerNr(){
        $nr=0;
        foreach ($this->game_state->players as $player) {
            if($player->status=='active'){
                $nr++;
            }
        }
        return $nr;
    }

    public function getMyPain(){
       $pNr= $this->getPlayerNr();
       $ret=300;
       switch ($pNr) {
           case 1:
            $ret=0;
             break;
           case 2:
            $ret=300;
             break;
           case 3:
            $ret=550;
             break; 
           case 4:
            $ret=800;
             break; 
       }

       return $ret;

    }

    public function showdown($game_state)
    {
    }
}
