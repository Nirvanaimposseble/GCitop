<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_asset',
        'nama_barang',
        'kategoriasset_id',
        'lokasi_id',
        'no_serial',
        'merk',
        'model',
        'status',
    ];
    protected $primaryKey = ('id');

    public function Asset()
    {
        return $this->hasMany(Asset::class,'id','id');
    }

    public function Kategoriasset()
    {
        return $this->belongsTo(Kategoriasset::class,'kategoriasset_id','id');
    }

    public function Lokasi()
    {
        return $this->belongsTo(Lokasi::class,'lokasi_id','id');
    }
}
