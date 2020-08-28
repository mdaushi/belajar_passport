<?php

namespace App\Http\Controllers\auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){


        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        User::create($data);
        return response()->json([
            'sukses' => 'true',
            'data' => $data
        ]);
    }
}
