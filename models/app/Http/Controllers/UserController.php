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
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            // 'role' => 'required'
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
        $user->save();

        return redirect('users');
    }

    public function show($id){
        $user = User::withRoles($id);
        $comments = Comment::where('commentable_type', 'App\Models\User')
        ->where('commentable_id', $id)
        ->get();
        return view('users.user', compact('user', 'comments'));
    }

    public function edit($id){
        $user = User::withRoles($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update_user($id, Request $request){
        $user = User::withRoles($id);
        $request->validate([
            'name' => 'required|min:2',
            'lastname' => 'required',
            'age' => 'required|numeric|min:12|max:99',
            'city' => 'required',
            'email' => 'required|email'
        ], [
            'name.required' => 'Необходимо ввести имя!',
            'name.min' => 'В имени должно быть минимум :min символа.',
            'lastname.required' => 'Необходимо ввести фамилию!',
            'age.required' => 'Необходимо ввести возраст!',
            'age.min' => 'Не обслуживаем клиентов младше :min лет.',
            'age.max' => 'Не обслуживаем клиентов старше :max лет.',
            'age.numeric' => 'Возраст должен быть числом!', 
            'email.required' => 'Необходимо ввести email!',
            'email.email' => 'Это не похоже на email.'
        ]);
        DB::transaction(function () use ($user, $request) {
            $user->update([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'age' => $request->input('age'),
                'city' => $request->input('city'),
                'email' => $request->input('email'),
            ]);

            $roles = $request->input('roles');
            $user->roles()->sync($roles); // Обновляем роли пользователя
        });

        return redirect('/users/'.$id);
    }

    public function delete($id){
        $user = User::find($id);
        $user->posts()->delete();
        $user->delete();
        return redirect('users');
    }
}

/**public function addUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        return redirect('/users')->with('success', 'Пользователь успешно добавлен');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min:6',
        ]);

        $user = User::find($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        return redirect('/users')->with('success', 'Пользователь успешно обновлен');
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect('/users')->with('success', 'Пользователь успешно удален');
        } else {
            return redirect('/users')->with('error', 'Пользователь не найден');
        }
    } */