<?php

namespace Router;

use Symfony\Component\HttpFoundation\Request;

class RequestRouter
{

    public function uri()
    {
        $request = Request::createFromGlobals();

        return substr(
        parse_url($request->getRequestUri(), PHP_URL_PATH), strlen($request->getBasePath()) + 1
        );

    }
}