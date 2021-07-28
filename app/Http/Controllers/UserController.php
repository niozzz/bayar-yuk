<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\ProfilModel;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->UserModel = new UserModel();
        $this->ProfilModel = new ProfilModel();
    }

    public function index()
    {
        $data = [
            'dataProfilUser' => $this->ProfilModel->getAllDataProfil(),
        ];
        return view('user/index', $data);
    }

    public function resetPassword()
    {

        $id_user = Request()->id_user;

        $password = Hash::make('password', [
            'rounds' => 12,
        ]);

        $data = [
            'password' => $password
        ];

        $this->ProfilModel->updateUsers($id_user, $data);
        return redirect()->route('user')->with('pesan', 'berhasil');
    }

    public function hapusAkun()
    {
        $id_user = Request()->id_user;

        $this->ProfilModel->deleteProfil($id_user);
        $this->UserModel->deleteUsers($id_user);
        return redirect()->route('user')->with('pesan', 'berhasil');
    }
}
