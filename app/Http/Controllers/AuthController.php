<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Отображение страницы с формами входа и регистрации
    public function showAuthForm()
    {
        return view('auth');
    }

    // Обработка входа
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('homee');  // Перенаправление на главную после успешного входа
        }

        return back()->withErrors(['email' => 'Неверные учетные данные']);
    }

    // Обработка регистрации
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);  // Автоматически войти после регистрации

        return redirect()->route('homee');  // Перенаправление на главную
    }
}
