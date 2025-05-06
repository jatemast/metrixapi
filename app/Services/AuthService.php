<?php

namespace App\Services;

use App\Models\TblUsuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    // Método para registrar un nuevo usuario
    public function register(array $data): array
    {
        // Solo requerimos nombre, correo y contraseña al momento del registro
        $user = TblUsuario::create([
            'nombre'     => $data['nombre'],
            'correo'     => $data['correo'],
            'telefono'   => $data['telefono'] ?? null,  // Puede ser null
            'cargo'      => $data['cargo'] ?? null,     // Puede ser null
            'rol'        => $data['rol'] ?? null,       // Puede ser null
            'contrasena' => Hash::make($data['contrasena']), // Cifrado de la contraseña
        ]);

        // Crear el token de acceso
        $token = $user->createToken('TokenName')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    // Método para iniciar sesión y generar un token
    public function login(array $credentials): ?string
    {
        // Intentar autenticar con el correo y la contraseña
        $attempt = Auth::attempt([
            'correo' => $credentials['correo'],
            'password' => $credentials['contrasena'],
        ]);

        if ($attempt) {
            $user = Auth::user();  // Obtener el usuario autenticado
            return $user->createToken('TokenName')->plainTextToken;
        }

        return null; // Si las credenciales son incorrectas
    }
}