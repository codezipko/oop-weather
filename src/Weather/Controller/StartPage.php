<?php

namespace Weather\Controller;

use Weather\FilterWeatherDisplay;


class StartPage
{
    use FilterWeatherDisplay;

    public function getTodayWeather(): array
    {
        // Get Today Weathers from Filter Trait
        $weather = $this->getTodayDisplay();

        return view('today-weather', compact('weather'));
    }

    public function getWeekWeather(): array
    {
        // Get Week Weathers from Filter Trait
        $weathers = $this->getWeekDisplay();

        return view('range-weather', compact('weathers'));
    }
}
