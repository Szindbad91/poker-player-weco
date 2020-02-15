<?php


class Hand
{
    public $card1rank;
    public $card1suit;
    public $card2rank;
    public $card2suit;

    public $cards=[
        'A'=>1,
        'K'=>1,
        'Q'=>1,
        'J'=>1,
    ];

    public function __construct($cards)
    {
        $this->card1rank = $cards[0]->rank;
        $this->card1suit = $cards[0]->suit;
        $this->card2rank = $cards[1]->rank;
        $this->card2suit = $cards[1]->suit;
    }

    public function checkHand()
    {
        $ret=0;
        if ($this->card1rank == $this->card2rank) {
            $ret=0;
        }
        else if(array_key_exists($this->card1rank,$this->cards) && array_key_exists($this->card2rank,$this->cards)){
            $ret=1;
        }
        else if(array_key_exists($this->card1rank,$this->cards) || array_key_exists($this->card2rank,$this->cards)){
            $ret=0;
        }
        else{
            $ret=-1;
        }
        return $ret;
    }
}
