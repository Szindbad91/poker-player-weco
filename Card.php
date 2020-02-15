<?php


class Card
{
    var $rank, $suit;

    /**
     * Card constructor.
     * @param $rank
     * @param $suit
     */
    public function __construct($rank, $suit)
    {
        $this->rank = $rank;
        $this->suit = $suit;
    }


}
