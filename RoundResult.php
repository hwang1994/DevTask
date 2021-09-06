<?php


class RoundResult
{
    /**
     * @var int
     */
    private $step; // change to private

    /**
     * @var array
     */
    private $carsPosition; // change to private

    public function __construct(int $step, array $carsPosition)
    {
        $this->step = $step;
        $this->carsPosition = $carsPosition;
    }

    //added getters since i changed properties to private
    public function getStep(): int
    {
        return $this->step;
    }

    public function getCarsPosition(): array
    {
        return $this->carsPosition;
    }
}
