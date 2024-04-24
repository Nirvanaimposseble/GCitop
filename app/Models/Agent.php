<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [
        'nik',
        'nama',
        'divisi',
        'status',
    ];
    protected $primaryKey = ('id');

    public function Agent()
    {
        return $this->hasMany(Agent::class,'id','id');
    }
}
