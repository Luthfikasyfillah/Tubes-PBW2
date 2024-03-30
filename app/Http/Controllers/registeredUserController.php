<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules\Password;

class registeredUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'username' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        // if (!Hash::check($request->password, $request->user()->password)) {
        //     return back()->withErrors([
        //         'password' => ['The provided password does not match our records.']
        //     ]);
        // }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }


    public function profile()
    {

        return view('editProfil');
    }

    public function profileEdit(Request $request)
    {

        $user = User::find(Auth::id());
        $user->update([
            'name' => request('name'),
            'username' => request('username'),
            'email' => request('email')
        ]);

        return redirect('/dashboard')->with("successEditProfile", "Berhasil mengedit profile");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $akun = Auth::user();
            return redirect('/dashboard')->with('success', 'Berhasil login');
        } else {
            return redirect('/signin')->with('error', 'Username atau Password salah');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/')->with('logoutsuccess', 'Anda telah logout');
    }
}
