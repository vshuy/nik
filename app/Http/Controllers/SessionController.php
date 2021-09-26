<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function setSession(Request $request)
    {
        $arrsession = 'Vu Sinh Huy';
        //$request->session()->put('username', $arrsession);
        session(['username' => $arrsession]);
        echo 'set Session successfully<br>';
    }

    public function getSession()
    {
        $value = session('username');
        echo 'Value of session is : '.$value.'<br>';
    }
}
