<?php

namespace Weather;

use Router\RequestRouter;
use Weather\Manager;
use Weather\Model\NullWeather;
use Weather\Api\GoogleApi;


trait FilterWeatherDisplay {

    public function getTodayDisplay()
    {
        try {
            $service = new Manager();
            $weather = $service->getTodayInfo();
        } catch (\Exception $exp) {
            $weather = new NullWeather();
        }

        if ( RequestRouter::uri() == 'weather-today' ) {
            $service = new Manager();
            $weather = $service->getTodayWeatherInfo();
        }

        if ( RequestRouter::uri() == 'google-today' ) {
            $service = new GoogleApi();
            $weather = $service->getToday();
        }

        return $weather;

    }

    public function getWeekDisplay()
    {
        try {
            $service = new Manager();
            $weathers = $service->getWeekInfo();
        } catch (\Exception $exp) {
            $weathers = [];
        }

        if ( RequestRouter::uri() == 'weather-week' ) {
            $service = new Manager();
            $weathers = $service->getWeekWeatherInfo();
        }

        if ( RequestRouter::uri() == 'google-week' ) {
            $service = new GoogleApi();
            $weathers = $service->getWeek();
        }

        return $weathers;
    }

}