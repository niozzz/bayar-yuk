<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiPiutangModel;
use App\Models\CatatanModel;

class CatatanController extends Controller
{

    public function __construct()
    {
        $this->TransaksiPiutangModel = new TransaksiPiutangModel;
        $this->CatatanModel = new CatatanModel;
    }

    public function index()
    {
        $id = auth()->user()->id;
        $data = [
            'piutang' => $this->CatatanModel->getAllDataById($id)
        ];

        return view('catatan/index', $data);
    }

    public function tambahCatatan()
    {
        return view('catatan/tambah-catatan');
    }

    public function insert()
    {
        Request()->validate([
            'nama_debitur' => 'required',
            'jumlah_cpiutang' => 'required',
            'tanggal_cpiutang' => 'required',
            'keterangan_cpiutang' => 'required',
        ]);

        $data = [
            'id_cpiutang' => NULL,
            'id_kreditur' => auth()->user()->id,
            'nama_debitur' => Request()->nama_debitur,
            'jumlah_cpiutang' => Request()->jumlah_cpiutang,
            'tanggal_cpiutang' => Request()->tanggal_cpiutang,
            'keterangan_cpiutang' => Request()->keterangan_cpiutang,
            'bukti_cpiutang' => '',
            'status_cpiutang' => 'Belum bayar'
        ];
        $this->CatatanModel->tambahData($data);
        return redirect()->route('catatan')->with('pesan', 'berhasil');
    }

    public function ubahCatatan($id)
    {
        $id_user = auth()->user()->id;
        $dataPiutang = $this->CatatanModel->getPiutang($id);

        if (empty($dataPiutang)) {
            abort(404);
        }

        if ($dataPiutang->id_kreditur != $id_user) {
            return redirect()->route('transaksiPiutang');
        }



        $data = [
            'piutang' => $dataPiutang,

        ];
        return view('catatan/ubah-catatan', $data);
    }

    public function update()
    {
        $id_cpiutang = Request()->id_cpiutang;
        Request()->validate([
            'nama_debitur' => 'required',
            'jumlah_cpiutang' => 'required',
            'tanggal_cpiutang' => 'required',
            'keterangan_cpiutang' => 'required',
        ]);

        $data = [
            'nama_debitur' => Request()->nama_debitur,
            'jumlah_cpiutang' => Request()->jumlah_cpiutang,
            'tanggal_cpiutang' => Request()->tanggal_cpiutang,
            'keterangan_cpiutang' => Request()->keterangan_cpiutang,
        ];
        $this->CatatanModel->ubahData($id_cpiutang, $data);
        return redirect()->route('catatan')->with('pesan', 'berhasil');
    }

    public function hapusCatatan($id)
    {
        $this->CatatanModel->hapusData($id);
        return redirect()->route('catatan')->with('pesan', 'berhasil');
    }
}
