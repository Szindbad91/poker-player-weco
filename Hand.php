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
        '10'=>1
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
                if(count($this->hands) == 2){
                    $ret = 20;
                }
                else{
                    $ret = 2;
                }
                break;
            case 'fullhouse':
                $ret = 20;
                break;
            case 'drill':
                $ret = 10;
                break;
            case 'two_pair':
                $ret = 5;
                break;
            case 'poker':
                $ret = 20;
                break;
            case 'nothing':
                if (count($this->hands) == 2) {
                    // if (array_key_exists($this->hands[0]->rank, $this->goodCards) && array_key_exists($this->hands[1]->rank, $this->goodCards)) {
                    //     $ret = 1;
                    // } else if (array_key_exists($this->hands[0]->rank, $this->goodCards) || array_key_exists($this->hands[1]->rank, $this->goodCards)) {
                    //     $ret = 1;
                    // }
                    if (!array_key_exists($this->hands[0]->rank, $this->goodCards)  || !array_key_exists($this->hands[1]->rank, $this->goodCards)) {
                            $ret = 0;
                        }
                        else{
                            $ret=1;
                        }

                } else {
                    $ret = 0;
                }
            break;
        }

        return $ret;
    }
}
