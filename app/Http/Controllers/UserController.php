<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use App\Http\Requests\StoreAccountRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function create(): View
    {
        return view('user.create');
    }

    public function store(StoreAccountRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($data['password'] !== $data['password_confirmation']) {
            return response()->json([
                'message' => "The given passwords don't match."
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user = User::create($data);

        event(new UserCreated($user));

        return response()->json([
            'message' => 'User created.'
        ]);
    }
}
