<?php

namespace App\Http\Controllers;

use App\Models\tbl_profiles;
use App\Models\tbl_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function usersView()
    {
        $user = tbl_users::orderBy('id', 'asc')->paginate(10);
        $profiles = tbl_profiles::all();
        return view('user/users', compact('user', 'profiles'));
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

    public function editView(Request $request, tbl_users $user)
    {
        $profiles = tbl_profiles::all();

        $idPerfil = $user->id_perfil;
        $userProfile = tbl_profiles::Where('id', $idPerfil)->first();

        return view('user.editusers', compact('user', 'profiles', 'userProfile'));
    }

    public function update(Request $request, tbl_users $user)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => ['required', 'email'],
            'perfil' => 'required',
            'estado' => 'required'
        ]);
        
        $user->nombre = $request->nombre;
        $user->email = $request->email;
        $user->estado = $request->estado;
        $user->id_perfil = $request->perfil;

        if ($user->save()) {
            return redirect()->to('users')->with('message', 'The user has been update successfully!');
        } else {
            return redirect()->back()->with('message', 'You can\'t not update the user');
        }
    }
}
