<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\acceuilView;


class annonceView extends Controller
{
    public function annonce($transport_types,$fourchette_poid_mins,$fourchette_poid_maxs,$fourchette_volume_mins,$fourchette_volume_maxs,$moyen_transports,$wilayas,$annonce){
        return (new acceuilView)->headSecondhome().(new acceuilView)->navbar().$this->header($annonce).$this->contenu($transport_types,$fourchette_poid_mins,$fourchette_poid_maxs,$fourchette_volume_mins,$fourchette_volume_maxs,$moyen_transports,$wilayas,$annonce).(new acceuilView)->footerSecond();
    } 

}