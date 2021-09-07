<?php

class Car
{
    const MIN_SPEED = 4;
    const TOTAL_SPEED = 22;

    /**
     * @var int
     */
    private $straightSpeed;

    /**
     * @var int
     */
    private $curveSpeed;

    public function __construct()
    {
        $this->straightSpeed = mt_rand(self::MIN_SPEED, self::TOTAL_SPEED - self::MIN_SPEED);
        $this->curveSpeed = self::TOTAL_SPEED - $this->straightSpeed;
    }

    public function getStraightSpeed(): int {
        return $this->straightSpeed;
    }

    public function getCurveSpeed(): int {
        return $this->curveSpeed;
    }
}