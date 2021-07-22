<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPiutangModel;
use App\Models\TemanModel;
use App\Models\ProfilModel;
use App\Helper\MyHelper;
use Illuminate\Http\Request;


class TemanController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->TransaksiPiutangModel = new TransaksiPiutangModel();
        $this->TemanModel = new TemanModel();
        $this->ProfilModel = new ProfilModel();
    }

    public function index()
    {
        $id_user = auth()->user()->id;
        $dataIdTeman1 = $this->TemanModel->getAllTeman1($id_user);
        $tampungID = [];
        foreach ($dataIdTeman1 as $data) {
            $tampungID[] = $data->id_user1;
        }
        $dataIdTeman2 = $this->TemanModel->getAllTeman2($id_user);

        foreach ($dataIdTeman2 as $data) {
            $tampungID[] = $data->id_user2;
        }

        $data = [
            'teman' => $this->TemanModel->getAllData(),
            'idTeman' => $tampungID,
        ];




        return view('teman/index', $data);
    }

    public function tambahTeman()
    {
        $id_user = auth()->user()->id;

        $profilUser = $this->ProfilModel->getDataProfil($id_user);

        $data = [
            'profilUser' => $profilUser
        ];

        return view('teman/tambah-teman', $data);
    }

    public function permintaan()
    {

        $id_user = auth()->user()->id;
        $dataPengirim = $this->TemanModel->getPengirimByPenerima($id_user);
        $tampungPengirim = [];
        foreach ($dataPengirim as $data) {
            $tampungPengirim[] = $data->id_pengirim;
        }
        $data = [
            'teman' => $this->TemanModel->getAllData(),
            'notifikasi' => $tampungPengirim,
        ];

        return view('teman/permintaan', $data);
    }

    public function insertNotifikasi()
    {
        Request()->validate([
            'nomor_hp' => 'required',
        ]);

        $id_user = auth()->user()->id;
        $dataNoHP = $this->TemanModel->getAllNomorHP();
        $tampungNoHP = [];
        foreach ($dataNoHP as $data) {
            $tampungNoHP[] = $data->nomor_hp;
        }

        if (in_array(Request()->nomor_hp, $tampungNoHP)) {

            $id_teman = $this->TemanModel->getIdByNoHp(Request()->nomor_hp);
            $id_teman = $id_teman[0]->id_user;

            if ((empty($this->TemanModel->getDataPertemananByDoubleId($id_user, $id_teman)) && !($id_user == $id_teman))) {

                $dataNotifikasi = [
                    'id_notifikasi' => NULL,
                    'id_pengirim' => $id_user,
                    'id_penerima' => $id_teman
                ];
                $this->TemanModel->tambahNotifikasi($dataNotifikasi);
                return redirect()->route('teman')->with('pesan', 'berhasil');
            } else {
                return redirect()->route('teman')->with('pesan', 'tidak berhasil');
            }
        } else {
            return redirect()->route('teman')->with('pesan', 'tidak berhasil');
        }
    }

    public function insertTeman()
    {

        $id_user = auth()->user()->id;
        $dataNoHP = $this->TemanModel->getAllNomorHP();
        $tampungNoHP = [];
        foreach ($dataNoHP as $data) {
            $tampungNoHP[] = $data->nomor_hp;
        }



        $id_teman = $this->TemanModel->getIdByNoHp(Request()->nomor_hp);
        $id_teman = $id_teman[0]->id_user;

        if (empty($this->TemanModel->getDataPertemananByDoubleId($id_user, $id_teman))) {
            $data = [
                'id_pertemanan' => NULL,
                'id_user1' => $id_user,
                'id_user2' => $id_teman
            ];

            $this->TemanModel->tambahData($data);
            $this->TemanModel->hapusNotifikasi($id_teman, $id_user);
            return redirect()->route('teman')->with('pesan', 'berhasil');
        } else {
            return redirect()->route('teman')->with('pesan', 'tidak berhasil');
        }
    }
}
