<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_lokasi',
        'wilayah',
        'regional',
        'area',
    ];
    protected $primaryKey = ('id');

    public function Lokasi()
    {
        return $this->hasMany(Lokasi::class,'id','id');
    }
}
