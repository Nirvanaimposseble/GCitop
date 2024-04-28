<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'kkategoriticket',
        'biaya',
        'saran',
        'jenis',
        'solved_time',
        'pending_time',
        'pending_at',
        'process_at',
        'ssubkategori',
        'ticket_id'
    ];
    protected $primaryKey = ('id');

    public function Detailticket()
    {
        return $this->hasMany(Detailticket::class,'id','id');
    }

    public function Kategoriticket()
    {
        return $this->belongsTo(Kategoriticket::class,'kkategoriticket','id');
    }

    public function Subkategori()
    {
        return $this->belongsTo(Subkategori::class, 'ssubkategori', 'id');
    }

}
