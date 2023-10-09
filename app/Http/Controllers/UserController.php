<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(
        protected UserService $userService
    ) {}

    /**
     * Registra um novo usuário e retorna um JSON como resposta
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse JsonResponse
     */
    public function register(UserRequest $request)
    {
        $validated = $request->validated();
        $userService->saveUser($validated);

        return response()->json(['message' => 'Usuário registrado com sucesso!']);
    }
}
