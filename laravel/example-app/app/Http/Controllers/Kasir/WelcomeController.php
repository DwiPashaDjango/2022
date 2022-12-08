<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $data = [
            'jdl' => 'Welcome'
        ];
        return view('kasir.index')->with($data);
    }
}
