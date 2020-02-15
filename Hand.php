<?php


class Hand
{
    public $card1rank;
    public $card1suit;
    public $card2rank;
    public $card2suit;

    public function __construct($cards)
    {
        $this->card1rank = $cards[0]->rank;
        $this->card1suit = $cards[0]->suit;
        $this->card2rank = $cards[1]->rank;
        $this->card2suit = $cards[1]->suit;
    }

    public function getMultiplierByHand()
    {
        if ($this->card1rank == $this->card2rank) {
            return 2;
        }
        return 0;
    }
}
