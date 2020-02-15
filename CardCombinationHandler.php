<?php


class CardCombinationHandler
{
   protected $cards;
    var $c1, $c2, $c3, $c4, $c5, $c6, $c7;

    /**
     * CardCombinationHandler constructor.
     * @param $c1
     * @param $c2
     * @param $c3
     * @param $c4
     * @param $c5
     * @param $c6
     * @param $c7
     */
    public function __construct($cards)
    {
        $this->cards=$cards;
    }

    public function getCombination()
    {
        if ($this->getPairCount() == 1) {
            return 'pair';
        } else if ($this->getPairCount() == 2) {
            return 'two_pair';
        }
        return 'nothing';
    }

    public function getPairCount()
    {
        $deck = [];
        for ($i = 2; $i < sizeof($this->cards); $i++) {
            $deck[] = $this->cards[$i];
        }
        return $this->CheckPair($this->cards[0], $deck) + $this->CheckPair($this->cards[1], $deck);
    }

    public function CheckPair($card, $deck)
    {
        foreach ($deck as $dcard) {
            if ($dcard->rank == $card->rank) {
                return 1;
            }
        }
        return 0;
    }

    public function isDrill()
    {

    }

    public function isFullHouse()
    {

    }

}
