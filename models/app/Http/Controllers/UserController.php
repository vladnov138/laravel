<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use App\Models\Post;
use App\Models\Tag;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUsers(){
        $users = User::all();
        return view('users.users', compact('users'));
    }

    public function create(){
        return view('users.create');
    }

    public function addUser(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->role_id = 1;
        $user->save();

        return redirect('/users')->with('success', 'Пользователь успешно добавлен');
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id, // Исключаем текущего пользователя из проверки на уникальность
            'password' => 'sometimes|required'
        ]);

        $user = User::findOrFail($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }
        $user->save();

        return redirect('/users')->with('success', 'Пользователь успешно обновлён');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'Пользователь успешно удалён');
    }
}