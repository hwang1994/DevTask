<?php

class Track
{
    const DEFAULT_TOTAL_ELEMENTS = 2000;
    const DEFAULT_ELEMENTS_SERIES_LENGTH = 40;

    /**
     * @var int
     */
    private $totalElements;

    /**
     * @var int
     */
    private $elementsSeriesLength;

    /**
     * @var array
     */
    private $trackElements;

    public function __construct(int $totalElements = self::DEFAULT_TOTAL_ELEMENTS, int $elementsSeriesLength = self::DEFAULT_ELEMENTS_SERIES_LENGTH) // default values
    {
        if ($elementsSeriesLength > 0 && $totalElements >= $elementsSeriesLength) //check parameters is probably unneccesary for this task
        {
            $this->totalElements = $totalElements;
            $this->elementsSeriesLength = $elementsSeriesLength;
        }
        else 
        {
            $this->totalElements = self::DEFAULT_TOTAL_ELEMENTS;
            $this->elementsSeriesLength = self::DEFAULT_ELEMENTS_SERIES_LENGTH;
        }
        // set track
        for($i = 0; $i < $totalElements; $i+=$elementsSeriesLength) // instructions said to start at element 0 (i wouldve used 1)
        {
            $range = $i + $elementsSeriesLength; // 40, 80, 120, 160...
            $randval = mt_rand(0, 1);
            for($j = $i; $j < $range; $j++)
            {
                $this->trackElements[] = $randval;
            }
        }
    }

    public function getTotalElements(): int
    {
        return $this->totalElements;
    }

    public function getElementsSeriesLength(): int
    {
        return $this->elementsSeriesLength;
    }

    public function getTrackElements(): array
    {
        return $this->trackElements;
    }

    public function getOrientationAtIndex($index): string
    {
        if ($index >= ($this->totalElements-1))
        {
            return 'end';
        }
        if ($this->trackElements[$index]==1)
        {
            return 'straight';
        }
        else if ($this->trackElements[$index]==0)
        {
            return 'curve';
        }
        else 
        {
            return 'orientation unknown';
        }
    }

}