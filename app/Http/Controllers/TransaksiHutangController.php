<?php

namespace App\Http\Controllers;

use App\Models\TransaksiHutangModel;
use App\Models\TransaksiPiutangModel;
use Illuminate\Http\Request;


class TransaksiHutangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->TransaksiHutangModel = new TransaksiHutangModel();
        $this->TransaksiPiutangModel = new TransaksiPiutangModel();
    }

    public function index()
    {
        $id = auth()->user()->id;
        $data = [
            'piutang' => $this->TransaksiHutangModel->getAllDataById($id)
        ];

        return view('transaksi/hutang', $data);
    }

    public function bayarHutang($id)
    {
        // mencegeah kesalahan id
        if (!$this->TransaksiPiutangModel->getPiutang($id)) {
            abort(404);
        }
        $data = [
            'piutang' => $this->TransaksiPiutangModel->getPiutang($id)
        ];

        return view('transaksi/bayar-hutang', $data);
    }

    public function update($id)
    {
        // Request()->validate([
        //     'gambar_bukti' => 'required'

        // ]);

        if (!Request()->gambar_bukti) {
            $data = [
                'status_tpiutang' => 'Belum dikonfirmasi'
            ];

            $this->TransaksiHutangModel->updateHutang($id, $data);
        } else {
            // upload gambar
            $file = Request()->gambar_bukti;
            $fileName = $id . '.' . $file->extension();
            $file->move(public_path('gambar/bukti'), $fileName);

            $data = [
                'bukti_tpiutang' => $fileName,
                'status_tpiutang' => 'Belum dikonfirmasi'
            ];

            $this->TransaksiHutangModel->updateHutang($id, $data);
        }

        return redirect()->route('transaksiHutang')->with('pesan', 'Data berhasil diupdate!');
    }
}
