<?php

namespace Router;

use Symfony\Component\HttpFoundation\Request;

class RequestRouter
{

    public static function uri()
    {
        $request = Request::createFromGlobals();

        return substr(
        parse_url($request->getRequestUri(), PHP_URL_PATH), strlen($request->getBasePath()) + 1
        );

    }

    public static function method()
    {
        $request = Request::createFromGlobals();

        return $request->getMethod();
    }
}