<?php

namespace App\Http\Controllers\api;

use App\Artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtikelController extends Controller
{
    public function post(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        
        Artikel::create($data);

        return response()->jsonSuccess();

    }

    public function get(){
        $data = Artikel::with(['kategori'])->get();

        return response()->jsonSuccess($data);
    }

    public function put(Request $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = Artikel::findOrFail($id);
        $item->update($data);

        return response()->jsonSuccess();
    }

    public function delete($id){
        $data = Artikel::findOrFail($id);
        $data->delete();

        return  response()->jsonSuccess();
    }
}
