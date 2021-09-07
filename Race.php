<?php

class Race
{
    const DEFAULT_STARTING_POSITION = 0;
    const DEFAULT_NUMBER_OF_CARS = 5;   
    /**
     * @var int
     */
    private $startingPosition= self::DEFAULT_STARTING_POSITION;

    /**
     * @var int
     */
    private $numberOfCars= self::DEFAULT_NUMBER_OF_CARS;

    /**
     * @var array of Cars
     */
    private $cars;

    /**
     * @var Track
     */
    private $track;

    public function __construct(int $startingPosition= self::DEFAULT_STARTING_POSITION, int $numberOfCars = self::DEFAULT_NUMBER_OF_CARS) // using defaults
    {
        //checking parameters is probably unneccesary for this task
        if ($startingPosition >= 0 && $numberOfCars > 0)
        {
            $this->startingPosition = $startingPosition;
            $this->numberOfCars = $numberOfCars;
        }
        for($i = 0; $i < $this->numberOfCars; $i++)
        {
            $this->cars[$i] = new Car;
        }
        $this->track = new Track;
    }

    public function getStartingPosition(): int {
        return $this->startingPosition;
    }

    public function getNumberOfCars(): int {
        return $this->numberOfCars;
    }

    public function getCars(): array {
        return $this->cars;
    }

    public function getTrack(): Track {
        return $this->track;
    }

    public function runRace(): RaceResult
    {
        print_r($this->track->getTrackElements());
        print_r($this->cars);
        $raceResult = new RaceResult;
        $carPositions = array_fill(0, $this->numberOfCars, $this->startingPosition);
        print_r($carPositions);
        $round = 0;
        $isRaceFinished = false;
        while (!$isRaceFinished)
        {
            for($i = 0; $i < $this->numberOfCars; $i++) // go through each car
            {
                $roundStartingIndex = $carPositions[$i];
                if ($this->track->getOrientationAtIndex($roundStartingIndex) == 'straight')
                {
                    $carPositions[$i] = $this->moveCar($roundStartingIndex, $this->cars[$i]->getStraightSpeed(), $this->track->getOrientationAtIndex($roundStartingIndex));
                }
                else if ($this->track->getOrientationAtIndex($roundStartingIndex) == 'curve')
                {
                    $carPositions[$i] = $this->moveCar($roundStartingIndex, $this->cars[$i]->getCurveSpeed(), $this->track->getOrientationAtIndex($roundStartingIndex));
                }
                //print_r($carPositions);
                if ($carPositions[$i] >= ($this->track->getTotalElements()-1)) // check if the car's position has reach the end of the track
                {
                    $isRaceFinished = true;
                }
            }
            $roundResult = new RoundResult(++$round, $carPositions);
            $raceResult->pushRoundResult($roundResult);
        }
        return $raceResult;
    }

    private function moveCar(int $carPosition, int $speed, string $orientation): int
    {
        // this if shortcut below assumes that the length of a series of elements is greater than each car's speed
        if ($this->track->getOrientationAtIndex($carPosition + $speed) == $orientation) // if no orientation change at the end
        {
            $carPosition += $speed;
        }
        else 
        {
            $boundary = $carPosition+$speed;
            for($i = $carPosition; $i < $boundary; $i++)
            {
                if ($this->track->getOrientationAtIndex($i) == $this->track->getOrientationAtIndex($i+1)) // if no change in orientation at next element
                {
                    $carPosition++;
                }
                else
                {
                    $carPosition++;
                    break;
                }
            }
        }
        return $carPosition;
    }
}
