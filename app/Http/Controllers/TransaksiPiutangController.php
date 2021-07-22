<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPiutangModel;
use App\Models\TemanModel;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class TransaksiPiutangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->TransaksiPiutangModel = new TransaksiPiutangModel();
        $this->TemanModel = new TemanModel();
        $this->User = new User();
    }

    public function index()
    {

        $id = auth()->user()->id;
        $data = [
            'piutang' => $this->TransaksiPiutangModel->getAllDataById($id)
        ];

        return view('transaksi/piutang', $data);
    }





    public function tambahPiutang()
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
            'idTeman' => $tampungID
        ];

        return view('transaksi/tambah-piutang', $data);
    }

    public function insert()
    {
        Request()->validate([
            'id_debitur' => 'required',
            'jumlah_tpiutang' => 'required',
            'tanggal_tpiutang' => 'required',
            'keterangan_tpiutang' => 'required',
        ]);

        $data = [
            'id_tpiutang' => NULL,
            'id_kreditur' => auth()->user()->id,
            'id_debitur' => Request()->id_debitur,
            'jumlah_tpiutang' => Request()->jumlah_tpiutang,
            'tanggal_tpiutang' => Request()->tanggal_tpiutang,
            'keterangan_tpiutang' => Request()->keterangan_tpiutang,
            'bukti_tpiutang' => '',
            'status_tpiutang' => 'Belum bayar'
        ];
        $this->TransaksiPiutangModel->tambahData($data);
        return redirect()->route('transaksiPiutang')->with('pesan', 'berhasil');
    }

    public function ubahPiutang($id)
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
            'piutang' => $this->TransaksiPiutangModel->getPiutang($id),
            'teman' => $this->TemanModel->getAllData(),
            'idTeman' => $tampungID
        ];
        return view('transaksi/ubah-piutang', $data);
    }

    public function update($id)
    {
        Request()->validate([

            'jumlah_tpiutang' => 'required',
            'tanggal_tpiutang' => 'required',
            'keterangan_tpiutang' => 'required',
        ]);

        $data = [
            'jumlah_tpiutang' => Request()->jumlah_tpiutang,
            'tanggal_tpiutang' => Request()->tanggal_tpiutang,
            'keterangan_tpiutang' => Request()->keterangan_tpiutang,
        ];
        $this->TransaksiPiutangModel->ubahData($id, $data);
        return redirect()->route('transaksiPiutang')->with('pesan', 'berhasil');
    }

    public function confirm($id_piutang)
    {
        // $dataPiutang = $this-> TransaksiPiutangModel -> getPiutang($id_piutang);

        $id_user = auth()->user()->id;
        $dataUser = $this->User->getUser($id_user);
        $passwordUser = $dataUser->password;
        $passwordInput = Request()->password_konfirmasi;

        if (Hash::check($passwordInput, $passwordUser)) {
            $data = [
                'status_tpiutang' => 'Lunas'
            ];

            $this->TransaksiPiutangModel->ubahData($id_piutang, $data);
            return redirect()->route('transaksiPiutang')->with('pesan', 'berhasil');
        } else {
            return redirect()->route('transaksiPiutang')->with('pesan', 'tidak berhasil');
        }
    }

    public function hapusPiutang($id)
    {

        $this->TransaksiPiutangModel->hapusData($id);
        return redirect()->route('transaksiPiutang')->with('pesan', 'berhasil');
    }
}
