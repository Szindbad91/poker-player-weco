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

        return 'nothing';
    }

    public function isPair()
    {

    }

    public function isDrill()
    {

    }

    public function isFullHouse()
    {

    }

}
