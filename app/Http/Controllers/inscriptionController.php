<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\wilaya;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class inscriptionController extends Controller
{
    public function index()
    {        
        $wilayas=['Adrar','Chlef','Laghouat','Oum El Bouaghi','Batna','Béjaïa','Biskra','Béchar','Blida','Bouira','Tamanrasset','Tébessa','Tlemcen','Tiaret','Tizi Ouzou','Alger','Djelfa','Jijel','Sétif','Saïda','Skikda','Sidi Bel Abbès','Annaba','Guelma','Constantine','Médéa','Mostaganem','MSila','Mascara','Ouargla','Oran','El Bayadh','Illizi','Bordj Bou Arreridj','Boumerdès','El Tarf','Tindouf','Tissemsilt','El Oued','Khenchela','Souk Ahras','Tipaza','Mila','Aïn Defla','Naâma','Aïn Témouchent','Ghardaïa','Relizane','Timimoun','Bordj Badji Mokhtar','Ouled Djellal','Béni Abbès','In Salah','In Guezzam','Touggourt','Djanet','El MGhair','El Meniaa'];
        $statut_creation='before';
        return view('inscription',compact('wilayas','statut_creation'));
    }

    public function add_user(Request $request)
    {        
        $request->validate(['nom'=>'string',
            'prenom'=>'string',
            'phone'=>'string',
            'email'=>'string',
            'password'=>'string',
            'adresse'=>'string',
        ]);
        // client
        if (!$request->transporteur){
            User::create([
                'name'=>$request->nom,
                'familyname'=>$request->prenom,
                'email'=>$request->email,
                'password'=>$request->password,
                'address'=>$request->adresse,
                'phone'=>$request->phone,
            ]); 
        }
        else{
            $transporteur=1;
            $wilaya=json_encode($request->wilaya);
            if(!$request->certifie){ //transporteur non certifie
                User::create([
                    'name'=>$request->nom,
                    'familyname'=>$request->prenom,
                    'email'=>$request->email,
                    'password'=>$request->password,
                    'address'=>$request->adresse,
                    'phone'=>$request->phone,
                    'transporteur'=>$transporteur,
                    'wilaya'=>$wilaya,
                ]);
            }
            else{ //transporteur certifie
                $certifie=1;
                $demande= Storage::disk('local')->put('demandes',$request->demande);
                $statut='en attente';
                User::create([
                    'name'=>$request->nom,
                    'familyname'=>$request->prenom,
                    'email'=>$request->email,
                    'password'=>$request->password,
                    'address'=>$request->adresse,
                    'phone'=>$request->phone,
                    'transporteur'=>$transporteur,
                    'wilaya'=>$wilaya,
                    'certifie'=>$certifie,
                    'demande'=>$demande,
                    'statut'=>$statut,
                ]); 
            }
        } 
        $wilayas=['Adrar','Chlef','Laghouat','Oum El Bouaghi','Batna','Béjaïa','Biskra','Béchar','Blida','Bouira','Tamanrasset','Tébessa','Tlemcen','Tiaret','Tizi Ouzou','Alger','Djelfa','Jijel','Sétif','Saïda','Skikda','Sidi Bel Abbès','Annaba','Guelma','Constantine','Médéa','Mostaganem','MSila','Mascara','Ouargla','Oran','El Bayadh','Illizi','Bordj Bou Arreridj','Boumerdès','El Tarf','Tindouf','Tissemsilt','El Oued','Khenchela','Souk Ahras','Tipaza','Mila','Aïn Defla','Naâma','Aïn Témouchent','Ghardaïa','Relizane','Timimoun','Bordj Badji Mokhtar','Ouled Djellal','Béni Abbès','In Salah','In Guezzam','Touggourt','Djanet','El MGhair','El Meniaa'];
        $statut_creation='after';
        return view('inscription',compact('wilayas','statut_creation'));
    }
}