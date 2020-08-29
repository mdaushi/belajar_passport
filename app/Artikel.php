<?php

namespace App;

use App\Kategori;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';

    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo( Kategori::class, 'kategori_id', 'id');
    }
}
