<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PenggunaService
{
    public function getPengguna()
    {
        $data = User::with('roles')->get();

        return $data;
    }
    public function storePengguna($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:re-password',
            'role_name' => 'required|in:Admin,Pemohon,Walikota,Setda,Verifikator',
            'is_active' => 'in:Aktif,Tidak Aktif',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {

            // dd($validator->errors()->first());
            return [
                'status' => false,
                'message' => $validator->errors()->first()
            ];
        }

        if ($data['avatar']) {
            $avatarName = $data['name'] . '_' . time() . '.' . $data['avatar']->extension();
            $data['avatar']->move(public_path('images'), $avatarName);
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // 'role' => $data['role'],
            'avatar' => $avatarName ?? null,
            'is_active' => $data['is_active'],
        ]);

        $user->assignRole($data['role_name']);

        return [
            'status' => true,
            'message' => 'Pengguna berhasil ditambahkan'
        ];
    }
}
