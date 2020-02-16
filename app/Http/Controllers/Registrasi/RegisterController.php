<?php

namespace App\Http\Controllers\Registrasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }
}
 
