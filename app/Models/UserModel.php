<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class UserModel extends Model
{
    public function deleteUsers($id_user)
    {
        DB::table('users')
            ->where('id', $id_user)
            ->delete();
    }
}
