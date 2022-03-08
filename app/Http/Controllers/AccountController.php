<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\Response;

class AccountController extends Controller
{
    public function create(): View
    {
        return view('user.create');
    }

    public function store(StoreAccountRequest $request)
    {
        $data = $request->validated();

        if ($data['password'] !== $data['password_confirmation']) {
            return response()->json([
                'message' => "The given passwords don't match."
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        User::create($data);
    }
}
