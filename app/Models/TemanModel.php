<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TemanModel extends Model
{
    public function getAllData()
    {
        $users = DB::table('users')
            ->join('profil', 'users.id', '=', 'profil.id_user')
            // ->join('pertemanan', 'users.id', '=', 'pertemanan.id_user1')
            ->get();

        return $users;
    }

    // mengambil id teman
    public function getAllTeman1($id)
    {
        $id_teman = DB::table('pertemanan')
            ->select('id_user1')
            ->where('id_user2', $id)
            ->get();

        return $id_teman;
    }

    public function getAllTeman2($id)
    {
        $id_teman = DB::table('pertemanan')
            ->select('id_user2')
            ->where('id_user1', $id)
            ->get();

        return $id_teman;
    }

    public function getAllNomorHP()
    {
        return DB::table('profil')
            ->select('nomor_hp')
            ->get();
    }

    public function tambahData($data)
    {
        DB::table('pertemanan')->insert($data);
    }

    public function tambahNotifikasi($data)
    {
        DB::table('notifikasi')->insert($data);
    }

    public function getIdByNoHp($nomor)
    {
        return DB::table('profil')
            ->select('id_user')
            ->where('nomor_hp', $nomor)
            ->get();
    }

    public function getPengirimByPenerima($id_penerima)
    {
        return DB::table('notifikasi')
            ->select('id_pengirim')
            ->where('id_penerima', $id_penerima)
            ->get();
    }

    public function getDataPertemananByDoubleId($id_user1, $id_user2)
    {
        return DB::table('pertemanan')
            ->where('id_user1', $id_user1)
            ->where('id_user2', $id_user2)
            ->first();
    }

    public function ekstrakData($data)
    {
        $tampung = [];
        foreach ($data as $d) {
            $tampung[] = $d;
        }

        return $tampung;
    }

    public function hapusNotifikasi($id_pengirim, $id_penerima)
    {
        DB::table('notifikasi')
            ->where('id_pengirim', $id_pengirim)
            ->where('id_penerima', $id_penerima)
            ->delete();
    }
}
