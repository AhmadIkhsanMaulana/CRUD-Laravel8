<?php

namespace App\Services\Features;

use App\Services\Service;

class User extends Service
{

    public function login($email, $password)
    {
        $data = [
            'email' => $email,
            'password' => $password,
        ];

        $response = $this->post('/auth', $data);

        return $this->showResponse($response);
    }

    public function logout()
    {
        $response = $this->delete('/auth');

        return $this->showResponse($response);
    }

    public function me()
    {
        $response = $this->get('/me');

        return $this->showResponse($response);
    }
}
