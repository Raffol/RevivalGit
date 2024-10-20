<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Показать профиль
    public function show()
    {
        $user = Auth::user();
        return view('lk', compact('user'));
    }

    // Показать форму редактирования профиля
    public function edit()
    {
        $user = Auth::user();
        return view('editprofile', compact('user'));
    }

    // Сохранение изменений профиля
    public function update(Request $request)
    {
        $user = Auth::user();

        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Аватарка
        ]);

        // Обновление данных
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {
            // Сохранение аватарки
            $avatarName = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarName;
        }

        $user->save();

        return redirect()->route('lk')->with('success', 'Изменения сохранены.');
    }
}
/*use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();
        $user->name = $request->name;

        // Обработка загрузки аватарки
        if ($request->hasFile('avatar')) {
            $avatarName = time() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('public/avatars', $avatarName);

            // Сохранение нового пути к аватарке
            $user->avatar = $avatarName;
        }

        $user->save();

        return redirect()->route('lk')->with('success', 'Профиль успешно обновлён');
    }
}*/
