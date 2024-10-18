<?php
use Illuminate\Support\Facades\Storage;
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
}
