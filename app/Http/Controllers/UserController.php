<?php

namespace App\Http\Controllers;

use App\Models\tbl_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;


class UserController extends Controller
{
    public function usersView()
    {
        $user = tbl_users::orderBy('id', 'desc')->paginate(5);

        return view('user/users', compact('user'));
    }


    public function create(Request $request, tbl_users $user)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
            'perfil' => 'required',
            'estado' => 'required'
        ]);


        $user->nombre = $request->nombre;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->estado = $request->estado;
        $user->id_perfil = $request->perfil;


        $correo = $request->email;
        $userInBd = tbl_users::Where('email', $correo)->first();

        if ($userInBd) {
            return redirect()->back()->with('message', 'User already in database');
        } else {
            $user->save();
            return redirect()->back()->with('message', 'The user has been registered successfully!');
        }
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials =  request()->only('email', 'password');

        //metodo auth nos sirve para verificar el hash de las password.
        if (Auth::attempt($credentials)) {

            //regenerar la sesion nos ayuda con la sesion fixation
            request()->session()->regenerate();
            return redirect('home');
        } else {
            return redirect()->back()->with('message', 'These credentials do not match our records.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('/')->with('message', 'You are logged out!');
    }
}
