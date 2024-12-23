<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validUsername = "Admin";
        $validPassword = "Admin";

        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === $validUsername && $password === $validPassword) {
            
            Session::put('isLoggedIn', true);
            Session::put('username', $username);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Credenciales inválidas.']);
    }

    public function logout(Request $request)
    {
        Session::flush();
        return redirect('/');
    }

    public function checkLogin()
    {
        // Este método verifica si la sesión está activa
        if (Session::get('isLoggedIn')) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'No estás autenticado.']);
    }
}
