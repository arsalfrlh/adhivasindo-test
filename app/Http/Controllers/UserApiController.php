<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $data = $this->userService->getAllUser();
        return response()->json($data, $data['status_code']);
    }

    public function show($id)
    {
        $data = $this->userService->getUserById($id);
        return response()->json($data, $data['status_code']);
    }

    public function store(Request $request)
    {
        $data = $this->userService->createUser($request->all());
        return response()->json($data, $data['status_code']);
    }

    public function update(Request $request, $id)
    {
        $data = $this->userService->updateUser($id, $request->all());
        return response()->json($data, $data['status_code']);
    }

    public function destroy($id)
    {
        $data = $this->userService->deleteUser($id);
        return response()->json($data, $data['status_code']);
    }
}
