<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriasset extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kategori',
    ];
    protected $primaryKey = ('id');
    
    public function Kategoriasset()
    {
        return $this->hasMany(Kategoriasset::class, 'id', 'id');
    }
}
