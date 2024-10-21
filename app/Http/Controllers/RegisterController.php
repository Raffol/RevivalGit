<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
use RegistersUsers;

// Куда перенаправлять пользователя после успешной регистрации
protected $redirectTo = '/lk';  // Например, на личный кабинет

/*public function __construct()
{
    $this->middleware('auth');
}*/

// Показ формы регистрации
public function showRegistrationForm()
{
return view('registration');
}

// Валидация данных регистрации
protected function validator(array $data)
{
return Validator::make($data, [
'name' => ['required', 'string', 'max:255'],
'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
'password' => ['required', 'string', 'min:8', 'confirmed'],
]);
}

// Создание нового пользователя
protected function create(array $data)
{
return User::create([
'name' => $data['name'],
'email' => $data['email'],
'password' => Hash::make($data['password']),
]);
}

// После успешной регистрации
protected function registered($request, $user)
{
// Перенаправление на страницу об успешной регистрации или личный кабинет
return redirect()->route('lk');
}
}
