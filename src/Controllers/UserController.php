<?php

namespace TwitterCloneApi\src\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Validation\Factory;
use TwitterCloneApi\src\Models\User;

class UserController
{
    public function store(Request $request, JsonResponse $response, Factory $validation)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
        ];

        $messages = [
            'required' => ':attribute é obrigatório.',
            'email' => ':attribute é inválido.',
            'unique' => ':attribute já cadastrado na base.',
        ];

        $validator = $validation->make($request->toArray(), $rules, $messages);

        if ($validator->fails()) {
            return $response->setData($validator->messages());
        }

        $request['password'] = password_hash($request->password, PASSWORD_DEFAULT, ['cost' => 12]);

        $newUser = User::create($request->toArray());

        $newUser = collect($newUser->toArray())->except('password')->toArray();

        return $response->setData($newUser);
    }
}