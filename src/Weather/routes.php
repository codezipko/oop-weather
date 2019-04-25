<?php

$router->get('', 'StartPage@getTodayWeather');
$router->get('week', 'StartPage@getWeekWeather');
$router->get('google-today', 'StartPage@getTodayWeather');
$router->get('google-week', 'StartPage@getWeekWeather');
$router->get('weather-today', 'StartPage@getTodayWeather');
$router->get('weather-week', 'StartPage@getWeekWeather');