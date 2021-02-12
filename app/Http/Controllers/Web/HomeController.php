<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Features\User;

class HomeController extends Controller
{
    public function login()
    {
        $authService = new User;

        $login = $authService->login($this->request->email, $this->request->password);

        if (!$login) {
            return redirect('/login')->with(['message' => 'something went wrong']);
        }

        $this->request->session()->put('token', $login['data']['token']);

        return redirect('/dashboard');
    }

    public function dashboard()
    {
        $authService = new User;
        $me = $authService->me();

        return view('user.dashboard')->with([
            'me' =>$me['data']
        ]);
    }
}
