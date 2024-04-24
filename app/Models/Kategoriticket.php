<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategoritiket',
    ];
    protected $primaryKey = 'id';

    public function Kategoriticket()
    {
        return $this->hasMany(Kategoriticket::class, 'kategoriticket_id', 'id');
    }
}
