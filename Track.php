<?php

class Track
{
    const DEFAULT_TOTAL_ELEMENTS = 2000;
    const DEFAULT_ELEMENTS_SERIES_LENGTH = 40;

    /**
     * @var int
     */
    private $totalElements = self::DEFAULT_TOTAL_ELEMENTS;

    /**
     * @var int
     */
    private $elementsSeriesLength = self::DEFAULT_ELEMENTS_SERIES_LENGTH;

    /**
     * @var array
     */
    private $trackElements;

    public function __construct(int $totalElements = self::DEFAULT_TOTAL_ELEMENTS, int $elementsSeriesLength = self::DEFAULT_ELEMENTS_SERIES_LENGTH) // default values
    {
        if ($elementsSeriesLength > 0 && $totalElements >= $elementsSeriesLength) //checking parameters is probably unneccesary for this task
        {
            $this->totalElements = $totalElements;
            $this->elementsSeriesLength = $elementsSeriesLength;
        }
        // set track
        for($i = 0; $i < $this->totalElements; $i+=$this->elementsSeriesLength) // instructions said to start at element 0
        {
            $range = $i + $this->elementsSeriesLength; // 40, 80, 120, 160...
            $randval = mt_rand(0, 1);
            for($j = $i; $j < $range && $j < $this->totalElements; $j++)
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
        if ($index >= 0 && $index < $this->totalElements-1) // don't care about orientation of last element since that's where we stop
        {
            if ($this->trackElements[$index]==1)
            {
                return 'straight';
            }
            else
            {
                return 'curve';
            }
        }
        else 
        {
            return 'orientation unknown';
        }
    }

}