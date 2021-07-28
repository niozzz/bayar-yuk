<?php

namespace App\Http\Controllers;

use App\Models\HomeModel;
use App\Models\TemanModel;
use App\Models\TransaksiHutangModel;
use App\Models\TransaksiPiutangModel;
use App\Models\ProfilModel;
use App\Models\CatatanModel;
use App\Models\User;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function __construct()
    {
        $this->HomeModel = new HomeModel();
        $this->TemanModel = new TemanModel();
        $this->TransaksiHutangModel = new TransaksiHutangModel();
        $this->TransaksiPiutangModel = new TransaksiPiutangModel();
        $this->ProfilModel = new ProfilModel();
        $this->User = new User();
        $this->CatatanModel = new CatatanModel();
    }

    public function landing()
    {
        return view('landing/index');
    }

    public function catatanPribadi($id)
    {
        $dataPiutang = $this->CatatanModel->getPiutangByIdUser($id);
        $dataProfil = $this->ProfilModel->getDataUsers($id);

        if (empty($dataPiutang)) {
            abort(404);
        }

        $data = [
            'piutang' => $dataPiutang,
            'profil' => $dataProfil
        ];

        return view('landing/catatan-pribadi', $data);
    }
}
