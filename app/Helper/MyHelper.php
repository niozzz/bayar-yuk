<?php

namespace App\Helper;

use App\Http\Controllers\Controller;
use App\Models\ProfilModel;

class MyHelper extends Controller
{


    // public function __construct()
    // {
    //     $this->ProfilModel = new ProfilModel();
    // }

    public static function test()
    {
        // $data = [
        //     'dataProfil' => $this->ProfilModel->getAllDataProfil()
        // ];
        return  ProfilModel::getGambar(auth()->user()->id);
    }
}
