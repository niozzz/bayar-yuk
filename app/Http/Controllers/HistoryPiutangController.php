<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPiutangModel;
use App\Models\HistoryPiutangModel;
use Illuminate\Http\Request;

class HistoryPiutangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->HistoryPiutangModel = new HistoryPiutangModel();
        $this->TransaksiPiutangModel = new TransaksiPiutangModel();
    }

    public function index()
    {
        $id = auth()->user()->id;
        $data = [
            'piutang' => $this->TransaksiPiutangModel->getAllDataById($id)
        ];

        return view('history/piutang', $data);
    }
}
