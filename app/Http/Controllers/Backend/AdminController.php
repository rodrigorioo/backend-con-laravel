<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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

    public function loguear(Request $request) {

        $email = $request->input('email');
        $password = $request->input('password');

        if(Auth::attempt([
            'email' => $email,
            'password' => $password,
        ])) {

            return Redirect::action([AdminController::class, 'home']);

        }

        // El usuario no se pudo loguear
        return Redirect::action([AdminController::class, 'login']);
    }

    public function logout() {
        Auth::logout();

        return Redirect::action([AdminController::class, 'logout']);
    }
}
