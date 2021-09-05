<?php

class RaceResult
{
    /**
     * @var array of StepResult
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
