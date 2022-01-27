<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class acceuilView extends Controller
{
    public function acceuil($status,$transport_types,$fourchette_poid_mins,$fourchette_poid_maxs,$fourchette_volume_mins,$fourchette_volume_maxs,$moyen_transports,$wilayas,$news){
        return $this->headhome().$this->navbar().$this->diapo($news).$this->rechercher().$this->add_annonceModal($status,$transport_types,$fourchette_poid_mins,$fourchette_poid_maxs,$fourchette_volume_mins,$fourchette_volume_maxs,$moyen_transports,$wilayas).$this->footer();
    }

}
