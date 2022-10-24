<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $data = [
            'Auth' => Auth::user(),
        ];
        return view('User.index', $data);
    }

    public function show($id)
    {

    }

}
