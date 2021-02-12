<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $token = Auth::attempt($this->request->only('email', 'password'));

        if (!$token) {
            throw new AuthenticationException();
        }

        return $this->respond(['data' => ['token' => $token]]);
    }
}
