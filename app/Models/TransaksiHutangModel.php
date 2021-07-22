<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransaksiHutangModel extends Model
{
    public function updateHutang($id, $data)
    {
        DB::table('tpiutang')
            ->where('id_tpiutang', $id)
            ->update($data);
    }

    public function getAllDataById($id)
    {

        return DB::table('tpiutang')
            ->join('users', 'tpiutang.id_kreditur', '=', 'users.id')
            ->where('id_debitur', $id)
            ->get();
    }

    public function jumlahHutang($id_user)
    {
        return DB::table('tpiutang')
            ->where('id_debitur', $id_user)
            ->whereNotIn('status_tpiutang', ['Lunas'])
            ->sum('jumlah_tpiutang');
    }

    public function totalHutang($id_user)
    {
        return DB::table('tpiutang')
            ->where('id_debitur', $id_user)
            ->sum('jumlah_tpiutang');
    }

    public function maxHutang()
    {
        $idAllUser = DB::table('tpiutang')
            ->select('id_debitur')
            ->distinct()
            ->get();

        $daftarHutang = [];
        foreach ($idAllUser as $data) {
            $totalHutang = $this->totalHutang($data->id_debitur);
            $daftarHutang[] = $totalHutang;
        }

        $dataMaxHutang = max($daftarHutang);
        $idUserMaxHutang = '';
        foreach ($idAllUser as $data) {
            global $idUserMaxHutang;
            if ($this->totalHutang($data->id_debitur) == $dataMaxHutang) {
                $idUserMaxHutang = $data->id_debitur;
            }
        }

        $data = [
            'id_user' => $idUserMaxHutang,
            'maxHutang' => $dataMaxHutang
        ];

        return $data;
    }

    public function dataHutangers()
    {
        // ambil semua id debitur
        $idAllHutangers = DB::table('tpiutang')
            ->select('id_debitur')
            ->get();

        // ekstrak data id debitur
        $tampungIdUser = [];
        foreach ($idAllHutangers as $data) {
            $tampungIdUser[] = $data->id_debitur;
        }

        // menghitung intensitas hutang dari setiap debitur
        $intensitasHutang = array_count_values($tampungIdUser);

        // mengambil jumlah intensitas terbanyak
        $jumlahTerbanyak = max(array_values($intensitasHutang));

        // mengambil id dengan jumlah intensitas terbanyak
        $idHutangers = array_search($jumlahTerbanyak, $intensitasHutang);

        $data = [
            'intensitasHutangTerbanyak' => $jumlahTerbanyak,
            'id_user' => $idHutangers
        ];

        return $data;
    }
}
