<?php

class Car
{
    const DEFAULT_MIN_SPEED = 4;
    const DEFAULT_TOTAL_SPEED = 22;

    /**
     * @var int
     */
    private $minSpeed;

    /**
     * @var int
     */
    private $totalSpeed;

    /**
     * @var int
     */
    private $straightSpeed;

    /**
     * @var int
     */
    private $curveSpeed;

    public function __construct(int $minSpeed = self::DEFAULT_MIN_SPEED, int $totalSpeed = self::DEFAULT_TOTAL_SPEED) // defaults
    {
        if ($minSpeed > 0 && $totalSpeed >= $minSpeed) //check parameters is probably unneccesary for this task
        {
            $this->minSpeed = $minSpeed;
            $this->totalSpeed = $totalSpeed;
        }
        else 
        {
            $this->minSpeed = self::DEFAULT_MIN_SPEED;
            $this->totalSpeed = self::DEFAULT_TOTAL_SPEED;
        }
        $this->straightSpeed = mt_rand($minSpeed, $totalSpeed - $minSpeed);
        $this->curveSpeed = $totalSpeed - $this->straightSpeed;
    }

    public function getStraightSpeed(): int {
        return $this->straightSpeed;
    }

    public function getCurveSpeed(): int {
        return $this->curveSpeed;
    }
}