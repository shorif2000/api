<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): array
    {
        return User::all();
    }

    public function show(User $user): User
    {
        return $user;
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function update(Request $request, User $user): User
    {
        $user->update($request->all());

        return $user;
    }

    public function delete(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
