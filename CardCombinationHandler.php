<?php


class CardCombinationHandler
{
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
        $this->c1 = $c1;
        $this->c2 = $c2;
        $this->c3 = $c3;
        $this->c4 = $c4;
        $this->c5 = $c5;
        $this->c6 = $c6;
        $this->c7 = $c7;
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
