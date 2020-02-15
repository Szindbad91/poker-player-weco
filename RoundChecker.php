<?php


class RoundChecker
{
    public function getRoundNr($game_object)
    {
        return sizeof($game_object->community_cards);
    }
}
