<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

    public function createUser(Request $request){
        $user = User::create($request->only(['name', 'email', 'password']));
        return [
            'message' => "Data user berhasil dibuat",
            'success' => true,
            'data' => $user,
            'status_code' => 201
        ];
    }

    public function updateUser($id, Request $request){
        $user = User::find($id);
        if(!$user){
            return [
                'message' => "Data user dengan id $id tidak ditemukan",
                'success' => false,
                'status_code' => 404
            ];
        }
        $user->update($request->only(['name', 'email']));
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

    public function searchByName(Request $request)
    {
        $name = strtolower($request->value);
        $data = $this->getExternalData();

        $result = collect($data)->filter(function ($item) use ($name) {
            return strtolower($item['nama']) == $name;
        })->values();

        return response()->json($result);
    }

    private function getExternalData()
    {
        $url = 'https://ogienurdiana.com/career/ecc694ce4e7f6e45a5a7912cde9fe131';

        $response = Http::get($url);
        $json = $response->json();

        $rows = explode("\n", trim($json['DATA']));
        array_shift($rows);

        $data = [];

        foreach ($rows as $row) {
            $parts = explode('|', $row);

            $data[] = [
                'nim' => $parts[0] ?? '',
                'nama' => $parts[1] ?? '',
                'ymd' => $parts[2] ?? '',
            ];
        }

        return $data;
    }
}