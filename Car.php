<?php

class Car
{
    const DEFAULT_MIN_SPEED = 4;
    const DEFAULT_TOTAL_SPEED = 22;

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
        if ($minSpeed <= 0 || $totalSpeed < $minSpeed) //check parameters is probably unneccesary for this task
        {
            $minSpeed = self::DEFAULT_MIN_SPEED;
            $totalSpeed = self::DEFAULT_TOTAL_SPEED;
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