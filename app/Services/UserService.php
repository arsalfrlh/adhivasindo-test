<?php
namespace App\Services;

use App\Models\User;

class UserService
{
    public function getAllUser(){
        $data = User::all();
        return [
            'message' => "Menampilkan semua data user",
            'success' => true,
            'data' => $data,
            'status_code' => 200
        ];
    }

    public function getUserById($id){
        $data = User::find($id);
        if(!$data){
            return [
                'message' => "Data user dengan id $id tidak ditemukan",
                'success' => false,
                'status_code' => 404
            ];
        }
        return [
            'message' => "Menampilkan data user dengan id $id",
            'success' => true,
            'data' => $data,
            'status_code' => 200
        ];
    }

    public function createUser($data){
        $user = User::create($data);
        return [
            'message' => "Data user berhasil dibuat",
            'success' => true,
            'data' => $user,
            'status_code' => 201
        ];
    }

    public function updateUser($id, $data){
        $user = User::find($id);
        if(!$user){
            return [
                'message' => "Data user dengan id $id tidak ditemukan",
                'success' => false,
                'status_code' => 404
            ];
        }
        $user->update($data);
        return [
            'message' => "Data user dengan id $id berhasil diupdate",
            'success' => true,
            'data' => $user,
            'status_code' => 200
        ];
    }

    public function deleteUser($id){
        $user = User::find($id);
        if(!$user){
            return [
                'message' => "Data user dengan id $id tidak ditemukan",
                'success' => false,
                'status_code' => 404
            ];
        }
        $user->delete();
        return [
            'message' => "Data user dengan id $id berhasil dihapus",
            'success' => true,
            'status_code' => 200
        ];
    }
}