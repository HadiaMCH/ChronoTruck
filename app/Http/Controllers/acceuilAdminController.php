<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Views\acceuilAdminView;

class acceuilAdminController extends Controller
{
    public function index()
    {        
        return (new acceuilAdminView)->acceuilAdmin();
    }
}
