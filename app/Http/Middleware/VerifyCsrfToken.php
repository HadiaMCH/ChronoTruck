<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'annonce','/annonce/modifier/{id}','supp_document','critere_add','add_document','modifier_presentation','pourcentage','add_news','refuser_justificatif','inscription'
    ];
}
