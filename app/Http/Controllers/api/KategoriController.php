<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    public function post(Request $request){
        $request->validate([
            'kategori' => 'required'
        ]);

        $data = $request->all();
        Kategori::create($data);

        return response()->jsonSuccess();
    }

    public function get(){
        $data = kategori::with(['artikel'])->get();

        return response()->jsonSuccess($data);
    }
}
