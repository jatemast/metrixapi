<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    // Método para registrar un nuevo usuario
    public function register(Request $request): JsonResponse
    {
        // Validar los datos de la solicitud
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',  // Nombre es obligatorio
            'correo' => 'required|string|email|max:255|unique:tbl_usuarios,correo',  // Correo obligatorio y único
            'contrasena' => 'required|string|min:8',  // Contraseña obligatoria
        ]);

        // Registrar el usuario y generar el token
        $data = $this->authService->register($validated);

        // Responder con el usuario registrado y el token
        return response()->json([
            'message' => 'Usuario registrado exitosamente',
            'user' => $data['user'],
            'token' => $data['token']
        ], 201);
    }

    // Método para iniciar sesión
    public function login(Request $request): JsonResponse
    {
        // Validar los datos de inicio de sesión
        $validated = $request->validate([
            'correo' => 'required|string|email|max:255',
            'contrasena' => 'required|string|min:8',
        ]);

        // Intentar iniciar sesión y generar el token
        $token = $this->authService->login($validated);

        if ($token) {
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['message' => 'Credenciales incorrectas'], 401);
    }
}
