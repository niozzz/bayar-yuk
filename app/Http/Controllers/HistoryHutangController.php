<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPiutangModel;
use App\Models\TransaksiHutangModel;
use App\Models\HistoryHutangModel;
use Illuminate\Http\Request;

class HistoryHutangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->HistoryHutangModel = new HistoryHutangModel();
        $this->TransaksiPiutangModel = new TransaksiPiutangModel();
        $this->TransaksiHutangModel = new TransaksiHutangModel();
    }

    public function index()
    {
        $id = auth()->user()->id;
        $data = [
            'piutang' => $this->TransaksiHutangModel->getAllDataById($id)
        ];


        return view('history/hutang', $data);
    }
}
