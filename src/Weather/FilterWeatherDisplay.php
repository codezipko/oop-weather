<?php

namespace Weather;

use Router\RequestRouter;
use Weather\Manager;
use Weather\Model\NullWeather;
use Weather\Api\GoogleApi;

class FilterWeatherDisplay {

    public function todayWeather()
    {
        $request = new RequestRouter;

        try {
            $service = new Manager();

            $weather = $service->getTodayInfo();

            if ($request->uri() == 'weather-today') {
                $service = new Manager();
                $weather = $service->getTodayWeatherInfo();
            }

            if($request->uri() == 'google-today') {
                $service = new GoogleApi();
                $weather = $service->getToday();
            }

        } catch (\Exception $exp) {
            $weather = new NullWeather();
        }

        return $weather;
    }

    public function weekWeathers()
    {
        $request = new RequestRouter;
        try {

            $service = new Manager();
            $weathers = $service->getWeekInfo();

            if($request->uri() == 'weather-week') {
                $service = new Manager();
                $weathers = $service->getWeekWeatherInfo();
            }

            if($request->uri() == 'google-weather') {
                $service = new GoogleApi();
                $weathers = $service->getWeek();
            }

        } catch (\Exception $exp) {
            $weathers = [];
        }

        return $weathers;
    }

}