<?php

namespace App\Http\Middleware;


use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;



class VerifyCsrfToken extends Middleware
{
        /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $addHttpCookie = true;
    protected $except = [
        'login',
        'register'
    ];

}
