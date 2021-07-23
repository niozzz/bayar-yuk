<?php

namespace App\Http\Controllers;

use App\Models\ProfilModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->ProfilModel = new ProfilModel();
    }

    public function index()
    {

        // mengambil data Profil
        $id_user = auth()->user()->id;
        $dataProfil = $this->ProfilModel->getDataProfil($id_user);
        $dataUsers = $this->ProfilModel->getDataUsers($id_user);

        $data = [
            'dataProfil' => $dataProfil,
            'dataUsers' => $dataUsers,

        ];
        return view('profil/index', $data);
    }

    public function update()
    {
        $id_user = auth()->user()->id;

        $getDataProfil = $this->ProfilModel->getDataProfil($id_user);

        if ($getDataProfil->nomor_hp == Request()->nomor_hp) {
            Request()->validate([

                'name' => 'required|min:4|max:50',
                'gender_user' => 'required',
                'gambar_user' => 'dimensions:max_width=1000,max_height=1000,ration=1/1|mimes:jpg,png,jpeg',
            ]);
        } else {
            Request()->validate([

                'name' => 'required|min:4|max:50',
                'nomor_hp' => 'required|min:11|max:14|unique:profil,nomor_hp',
                'gender_user' => 'required',
                'gambar_user' => 'dimensions:max_width=1000,max_height=1000,ration=1/1|mimes:jpg,png,jpeg',
            ]);
        }


        // mengatasi gambar tidak diupload
        $gambarUser = Request()->gambar_user;
        if (empty($gambarUser)) {
            $dataUsers = [
                'name' => Request()->name,
            ];
            $dataProfil = [
                'nomor_hp' => Request()->nomor_hp,
                'gender_user' => Request()->gender_user,
            ];

            $this->ProfilModel->updateProfil($id_user, $dataProfil);
            $this->ProfilModel->updateUsers($id_user, $dataUsers);
            return redirect()->route('profil')->with('pesan', 'berhasil');
        } else {
            $dataUsers = [
                'name' => Request()->name,
            ];

            // upload gambar
            $file = Request()->gambar_user;
            $fileName = 'profil_' . $id_user . '.' . $file->extension();
            $file->move(public_path('gambar/profil'), $fileName);

            $dataProfil = [
                'nomor_hp' => Request()->nomor_hp,
                'gender_user' => Request()->gender_user,
                'gambar_user' => $fileName,
            ];

            $this->ProfilModel->updateProfil($id_user, $dataProfil);
            $this->ProfilModel->updateUsers($id_user, $dataUsers);
            return redirect()->route('profil')->with('pesan', 'berhasil');
        }
    }

    public function gantiPassword()
    {
        $id_user = auth()->user()->id;
        $password_user = auth()->user()->password;

        Request()->validate([

            'password' => 'required',
            'password_baru' => 'required|min:8',
            'password_konfirmasi' => 'required|same:password_baru',
        ]);

        if (Hash::check(Request()->password, $password_user)) {
            $data = [
                'password' => Hash::make(Request()->password_baru)
            ];
            $this->ProfilModel->updateUsers($id_user, $data);
            return redirect()->route('profil')->with('pesan', 'berhasil');
        } else {

            return redirect()->route('profil')->with('pesan', 'tidak berhasil');
        }
    }
}
