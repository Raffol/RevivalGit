<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function showProfile()
    {
        // Получаем аутентифицированного пользователя
        $user = auth()->user();

        // Проверяем, существует ли пользователь
        if ($user) {
            return view('lk', compact('user'));
        } else {
            return redirect()->route('login')->with('error', 'Вам нужно войти в систему');
        }
    }

    public function index()
    {

        $user = Controller::User();

        return view('lk', compact('user'));
    }
}
