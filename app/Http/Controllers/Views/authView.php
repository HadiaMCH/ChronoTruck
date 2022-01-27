<?php 

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\acceuilView;


class authView extends Controller
{
    public function inscription($wilayas,$statut_creation){
        return (new acceuilView)->headhome().(new acceuilView)->navbar().$this->header($statut_creation).$this->contenu($wilayas).(new acceuilView)->footer();
    }

}