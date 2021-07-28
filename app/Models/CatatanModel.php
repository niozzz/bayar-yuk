<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CatatanModel extends Model
{
    public function getAllDataById($id)
    {

        return DB::table('cpiutang')
            ->where('id_kreditur', $id)
            ->get();
    }

    public function tambahData($data)
    {
        DB::table('cpiutang')->insert($data);
    }

    public function getPiutang($id)
    {
        return DB::table('cpiutang')
            ->where('id_cpiutang', $id)
            ->first();
    }

    public function ubahData($id_cpiutang, $data)
    {
        DB::table('cpiutang')
            ->where('id_cpiutang', $id_cpiutang)
            ->update($data);
    }

    public function hapusData($id)
    {
        DB::table('cpiutang')
            ->where('id_cpiutang', $id)
            ->delete();
    }
}
