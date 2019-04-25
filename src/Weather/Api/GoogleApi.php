<?php

namespace Weather\Api;

use Weather\Model\NullWeather;
use Weather\Model\Weather;
use Weather\Api\DbRepository;

class GoogleApi
{
    /**
     * @return Weather
     * @throws \Exception
     */
    public function getToday()
    {
        $today = $this->load(new NullWeather());
        $today->setDate(new \DateTime());

        return $today;
    }

    /**
     * @param Weather $before
     * @throws \Exception
     */

    public function getWeek() {

        $range = new DbRepository;
        $week = $range->selectByRange(new \DateTime('midnight'), new \DateTime('+6 days midnight'));

        return $week;

    }

    /**
     * @param Weather $before
     * @return Weather
     * @throws \Exception
     */
    private function load(Weather $before)
    {
        $now = new Weather();
        $base = $before->getDayTemp();
        $now->setDayTemp(random_int(5 - $base, 5 + $base));

        $base = $before->getNightTemp();
        $now->setNightTemp(random_int(-5 - abs($base), -5 + abs($base)));

        $now->setSky(random_int(1, 3));

        return $now;
    }
}
