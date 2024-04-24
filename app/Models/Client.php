<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'nik',
        'nama',
        'posisi_id',
        'lokasi_id',
        'telp',
        'ip_address',
    ];
    protected $primaryKey = ('id');

    public function Client()
    {
        return $this->hasMany(Client::class,'id','id');
    }
}
