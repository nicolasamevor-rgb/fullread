<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as MiddlewareProxy;

class TrustProxies extends MiddlewareProxy
{
    /**
     * The trusted proxies for this application.
     *
     * @var array|string|null
     */
    protected $proxies = '*';

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers = \Illuminate\Http\Request::HEADER_X_FORWARDED_ALL;
}
