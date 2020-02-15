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
    public function __construct($c1, $c2, $c3 = null, $c4 = null, $c5 = null, $c6 = null, $c7 = null)
    {
        $this->cards=func_get_args();
    }

    public function getCombination()
    {
        if ($this->getPairCount() == 1) {
            return 'pair';
        } else if ($this->getPairCount() == 2) {
            return 'two_pair';
        }
        if ($this->isDrill()) {
            return 'drill';
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

    public function CheckPair($card, $deck, $count = false)
    {
        $c = 0;
        foreach ($deck as $dcard) {
            if ($dcard->rank == $card->rank) {
                if ($count) {
                    $c++;
                } else {
                    return 1;
                }

            }
        }
        return $c;
    }

    public function isDrill()
    {
        $deck = [];
        for ($i = 2; $i < sizeof($this->cards); $i++) {
            $deck[] = $this->cards[$i];
        }
        return $this->getPairCount($this->cards[0], $deck, true) == 2 || $this->getPairCount($this->cards[1], $deck, true);
    }

    public function isFullHouse()
    {

    }

}
