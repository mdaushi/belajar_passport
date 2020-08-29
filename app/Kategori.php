<?php

namespace App;

use App\Artikel;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $guarded = [];
    
    public function artikel()
    {
        return $this->hasMany( Artikel::class, 'kategori_id', 'id');
    }
}
