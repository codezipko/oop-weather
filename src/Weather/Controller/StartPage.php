<?php

namespace Weather\Controller;

use http\Client\Request;
use Weather\FilterWeatherDisplay;

class StartPage
{

    public function getTodayWeather(): array
    {
        $weatherClass = new FilterWeatherDisplay;

        $weather = $weatherClass->todayWeather();

        return ['template' => 'today-weather.twig', 'context' => ['weather' => $weather]];
    }

    public function getWeekWeather(): array
    {

        $weatherClass = new FilterWeatherDisplay;

        $weathers = $weatherClass->weekWeathers();

        return ['template' => 'range-weather.twig', 'context' => ['weathers' => $weathers]];
    }
}
