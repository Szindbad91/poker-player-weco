<?php


class Hand
{
    public $card1rank;
    public $card1suit;
    public $card2rank;
    public $card2suit;
    private $hand;
    public $goodCards = [
        'A' => 1,
        'K' => 1,
        'Q' => 1,
        'J' => 1,
    ];

    public function __construct($cards)
    {
        $this->hands = $cards;
        $this->ch = new CardCombinationHandler($this->hands);
    }

    public function checkHand()
    {
        $ret = 0;
        $combName = $this->ch->getCombination();
        switch ($combName) {
            case 'pair':
                $ret = 1;
                break;
            case 'fullhouse':
                $ret = 7;
                break;
            case 'drill':
                $ret = 3;
                break;
            case 'two_pair':
                $ret = 2;
                break;
            case 'poker':
                $ret = 20;
                break;
            case 'nothing':
                if (count($this->hands) == 2) {
                    if (array_key_exists($this->hands[0]->rank, $this->goodCards) && array_key_exists($this->hands[1]->rank, $this->goodCards)) {
                        $ret = 100;
                    } else if (array_key_exists($this->hands[0]->rank, $this->goodCards) || array_key_exists($this->hands[1]->rank, $this->goodCards)) {
                        $ret = 1;
                    }
                } else {
                    $ret = 0;
                }
                break;
        }

        return $ret;
    }
}
