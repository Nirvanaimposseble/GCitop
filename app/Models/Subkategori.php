<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkategori extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_subkategori',
        'kategoriticket_id',
    ];
    protected $primaryKey = 'id';

    public function Subkategori()
    {
        return $this->hasMany(Subkategori::class,'id','id');
    }

    public function kategoriticket()
    {
        return $this->belongsTo(Kategoriticket::class, 'kategoriticket_id', 'id');
    }
}
