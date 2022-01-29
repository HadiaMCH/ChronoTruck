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
        'annonce','modifier','annonce/modifier/*','supp_document','critere_add','add_document','modifier_presentation','pourcentage','add_news','refuser_justificatif','inscription','acceuil','connexion','connexion_admin','views_annonce','noter_transporteur','signaler_transporteur','signaler_client','views_news','profile','valider_annonce','annuler_annonce','bannir','valider_inscription','valider_demande_certification','valider_certification','add_contact'
    ];
}
