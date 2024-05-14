<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class greetcontroller extends Controller
{
    public function hello($greetings){
        return view('greet', [
            'greet' => $greetings
        ]);
    }
}
