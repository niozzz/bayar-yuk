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
}
