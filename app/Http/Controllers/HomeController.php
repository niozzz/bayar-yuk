<?php

namespace App\Http\Controllers;

use App\Models\HomeModel;
use App\Models\TemanModel;
use App\Models\TransaksiHutangModel;
use App\Models\TransaksiPiutangModel;
use App\Models\ProfilModel;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->HomeModel = new HomeModel();
        $this->TemanModel = new TemanModel();
        $this->TransaksiHutangModel = new TransaksiHutangModel();
        $this->TransaksiPiutangModel = new TransaksiPiutangModel();
        $this->ProfilModel = new ProfilModel();
        $this->User = new User();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id_user = auth()->user()->id;

        // Data Profil User
        $profilUser = $this->ProfilModel->getDataProfil($id_user);

        if (empty($profilUser)) {
            $data = [
                'id_profil' => NULL,
                'id_user' => $id_user,
                'gender_user' => '',
                'nomor_hp' => $id_user,
                'quote_user' => '',
                'gambar_user' => 'profil_default.jpg',
            ];

            $profilUser = $this->ProfilModel->insertProfil($data);
        }

        //Jumlah Teman
        $dataIdTeman1 = $this->TemanModel->getAllTeman1($id_user);
        $tampungID = [];
        foreach ($dataIdTeman1 as $data) {
            $tampungID[] = $data->id_user1;
        }
        $dataIdTeman2 = $this->TemanModel->getAllTeman2($id_user);

        foreach ($dataIdTeman2 as $data) {
            $tampungID[] = $data->id_user2;
        }

        // Jumlah Notifikasi
        $dataPengirim = $this->TemanModel->getPengirimByPenerima($id_user);
        $tampungPengirim = [];
        foreach ($dataPengirim as $data) {
            $tampungPengirim[] = $data->id_pengirim;
        }

        // Jumlah Hutang
        $jumlahHutang = $this->TransaksiHutangModel->jumlahHutang($id_user);
        $jumlahPiutang = $this->TransaksiPiutangModel->jumlahPiutang($id_user);

        // max Piutang
        $dataMaxPiutang = $this->TransaksiPiutangModel->maxPiutang();
        $profilMaxPiutang = $this->ProfilModel->getProfilJoinUsers($dataMaxPiutang['id_user']);
        $maxPiutang = $dataMaxPiutang['maxPiutang'];

        // max Piutang
        $dataMaxHutang = $this->TransaksiHutangModel->maxHutang();
        $profilMaxHutang = $this->ProfilModel->getProfilJoinUsers($dataMaxHutang['id_user']);
        $maxHutang = $dataMaxHutang['maxHutang'];

        // Sering Ngutang
        $dataHutangers = $this->TransaksiHutangModel->dataHutangers();
        $profilHutangers = $this->ProfilModel->getProfilJoinUsers($dataHutangers['id_user']);
        $intensitasHutangTerbanyak = $dataHutangers['intensitasHutangTerbanyak'];

        // Sering Minjemin 
        $dataPiutangers = $this->TransaksiPiutangModel->dataPiutangers();
        $profilPiutangers = $this->ProfilModel->getProfilJoinUsers($dataPiutangers['id_user']);
        $intensitasPiutangTerbanyak = $dataPiutangers['intensitasPiutangTerbanyak'];





        $data = [
            'teman' => $this->TemanModel->getAllData(),
            'jumlahNotifikasi' => count($tampungPengirim),
            'jumlahTeman' => count($tampungID),
            'jumlahHutang' => $jumlahHutang,
            'jumlahPiutang' => $jumlahPiutang,
            'profilUser' => $profilUser,
            'profilMaxPiutang' => $profilMaxPiutang,
            'maxPiutang' => $maxPiutang,
            'profilMaxHutang' => $profilMaxHutang,
            'maxHutang' => $maxHutang,
            'profilHutangers' => $profilHutangers,
            'intensitasHutangTerbanyak' => $intensitasHutangTerbanyak,
            'profilPiutangers' => $profilPiutangers,
            'intensitasPiutangTerbanyak' => $intensitasPiutangTerbanyak,


        ];
        return view('dashboard', $data);
    }

    
}
