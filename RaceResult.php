<?php

class RaceResult
{
    /**
     * @var array of RoundResult
     */
    private $roundResults = [];


    public function pushRoundResult(RoundResult $roundResult)
    {
        $this->roundResults[] = $roundResult;
    }

    public function getRoundResults(): array
    {
        return $this->roundResults;
    }
}
