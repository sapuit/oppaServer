<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Illuminate\Session\TokenMismatchException;


class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     * Bỏ qua xác nhận token
     * @var array
     */
    protected $except = [
        //
        'prescription/post-image',
    	'prescription/post-drugs',
        'test',
        'prescription/conform'
    ];

}
