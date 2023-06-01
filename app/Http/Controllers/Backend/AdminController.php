<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function home () {
        return view('admin.index');
    }

    public function login() {
        return view('admin.login');
    }

    public function loguear(LoginRequest $request) {

        $email = $request->input('email');
        $password = $request->input('password');

        if(Auth::attempt([
            'email' => $email,
            'password' => $password,
        ])) {

            return Redirect::action([AdminController::class, 'home']);

        }

        // El usuario no se pudo loguear
        return Redirect::action([AdminController::class, 'login'])->withErrors([
            'login' => 'Usuario y/o contraseña inválidos',
        ]);
    }

    public function logout() {
        Auth::logout();

        return Redirect::action([AdminController::class, 'logout']);
    }
}
