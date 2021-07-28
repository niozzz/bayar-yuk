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
}
