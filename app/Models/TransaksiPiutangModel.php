<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransaksiPiutangModel extends Model
{
    public function tambahData($data)
    {
        DB::table('tpiutang')->insert($data);
    }

    public function getAllData()
    {
        return DB::table('tpiutang')->get();
    }

    public function getAllDataById($id)
    {

        return DB::table('tpiutang')
            ->join('users', 'tpiutang.id_debitur', '=', 'users.id')
            ->where('id_kreditur', $id)
            ->get();
    }

    public function getPiutang($id)
    {
        return DB::table('tpiutang')
            ->join('users', 'tpiutang.id_debitur', '=', 'users.id')
            ->where('id_tpiutang', $id)
            ->first();
    }

    public function ubahData($id, $data)
    {
        DB::table('tpiutang')
            ->where('id_tpiutang', $id)
            ->update($data);
    }

    public function hapusData($id)
    {
        DB::table('tpiutang')
            ->where('id_tpiutang', $id)
            ->delete();
    }

    public function jumlahPiutang($id_user)
    {
        return DB::table('tpiutang')
            ->where('id_kreditur', $id_user)
            ->whereNotIn('status_tpiutang', ['Lunas'])
            ->sum('jumlah_tpiutang');
    }

    public function totalPiutang($id_user)
    {
        return DB::table('tpiutang')
            ->where('id_kreditur', $id_user)
            ->sum('jumlah_tpiutang');
    }




    public function maxPiutang()
    {
        $idAllUser = DB::table('tpiutang')
            ->select('id_kreditur')
            ->distinct()
            ->get();

        $daftarPiutang = [];
        foreach ($idAllUser as $data) {
            $totalPiutang = $this->totalPiutang($data->id_kreditur);
            $daftarPiutang[] = $totalPiutang;
        }

        $dataMaxPiutang = max($daftarPiutang);
        $idUserMaxPiutang = '';
        foreach ($idAllUser as $data) {
            global $idUserMaxPiutang;
            if ($this->totalPiutang($data->id_kreditur) == $dataMaxPiutang) {
                $idUserMaxPiutang = $data->id_kreditur;
            }
        }

        $data = [
            'id_user' => $idUserMaxPiutang,
            'maxPiutang' => $dataMaxPiutang
        ];

        return $data;
    }

    public function dataPiutangers()
    {
        // ambil semua id kreditur
        $idAllPiutangers = DB::table('tpiutang')
            ->select('id_kreditur')
            ->get();

        // ekstrak data id kreditur
        $tampungIdUser = [];
        foreach ($idAllPiutangers as $data) {
            $tampungIdUser[] = $data->id_kreditur;
        }

        // menghitung intensitas Piutang dari setiap kreditur
        $intensitasPiutang = array_count_values($tampungIdUser);

        // mengambil jumlah intensitas terbanyak
        $jumlahTerbanyak = max(array_values($intensitasPiutang));

        // mengambil id dengan jumlah intensitas terbanyak
        $idPiutangers = array_search($jumlahTerbanyak, $intensitasPiutang);

        $data = [
            'intensitasPiutangTerbanyak' => $jumlahTerbanyak,
            'id_user' => $idPiutangers
        ];

        return $data;
    }
}
