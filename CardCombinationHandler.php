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
        if ($this->checkMultipleOptions()) {
            return $this->checkMultipleOptions();
        }
        return 'nothing';
    }


    public function checkMultipleOptions()
    {
        $pairs = 0;
        $drill = 0;
        $poker = 0;

        $counts = [];
        for ($i = 0; $i < sizeof($this->cards); $i++) {
            $count = 0;
            for ($j = 0; $j < sizeof($this->cards); $j++) {
                if ($i !== $j) {
                    if ($this->cards[$i]->rank == $this->cards[$j]->rank) {
                        $count ++;
                    }
                }
            }
            if ($count == 1) {
                $pairs++;
            } else if ($count == 2) {
                $drill++;
            } else if ($count == 3) {
                $poker++;
            }

        }
        if (!$this->withHand())
        {
            return '';
        }
        if ($poker) {
            return 'poker';
        } else if ($pairs && $drill) {
            return 'fullhouse';
        } else if ($drill) {
            return 'drill';
        } else if ($pairs >= 4) {
            return 'two_pair';
        } else if ($pairs) {
            return 'pair';
        }
        return '';
    }
    public function withHand()
    {
        for ($i = 0; $i < 2; $i++) {
            $count = 0;
            for ($j = 0; $j < sizeof($this->cards); $j++) {
                if ($i !== $j) {
                    if ($this->cards[$i]->rank == $this->cards[$j]->rank) {
                            return true;
                    }
                }
            }
        }
        return false;
    }
}
