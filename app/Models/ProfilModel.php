<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProfilModel extends Model
{
    // mengambil semua data profil
    public static function getAllDataProfil()
    {
        return DB::table('profil')
            ->join('users', 'users.id', '=', 'profil.id_user')
            ->get();
    }

    // mengambil data profil berdasarkan id
    public function getDataProfil($id_user)
    {
        return DB::table('profil')
            ->where('id_user', $id_user)
            ->first();
    }

    // mengambil data Users berdasarkan id
    public function getDataUsers($id_user)
    {
        return DB::table('users')
            ->where('id', $id_user)
            ->first();
    }

    // mengambil semua data profil dan users berdasarkan id
    public function getProfilJoinUsers($id_user)
    {
        return DB::table('profil')
            ->join('users', 'users.id', '=', 'profil.id_user')
            ->where('id', $id_user)
            ->first();
    }

    // melakukan update tabel Users
    public function updateUsers($id_user, $data)
    {
        DB::table('users')
            ->where('id', $id_user)
            ->update($data);
    }

    // melakukan update tabel profil
    public function updateProfil($id_user, $data)
    {
        DB::table('profil')
            ->where('id_user', $id_user)
            ->update($data);
    }

    // melakukan insert data tabel profil
    public function insertProfil($data)
    {
        DB::table('profil')
            ->insert($data);
    }

    // menghapus data tabel profil berdasarkan id
    public function deleteProfil($id_user)
    {
        DB::table('profil')
            ->where('id_user', $id_user)
            ->delete();
    }

    public static function getGambar($id_user)
    {
        return DB::table('profil')
            ->select('gambar_user')
            ->where('id_user', $id_user)
            ->first();
    }
}
