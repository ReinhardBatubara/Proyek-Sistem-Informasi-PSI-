<?php
class Kernel
{
    protected $routeMiddleware = [
        // middleware lain ...
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];
}
