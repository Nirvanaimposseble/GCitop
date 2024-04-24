<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_ticket',
        'kendala',
        'detail_kendala',
        'asset_id',
        'client_id',
        'lokasi_id',
        'agent_id',
        'status',
        'ticket_for',
        'role',
    ];

    protected $primaryKey = 'id';

    public function Detailticket()
    {
        return $this->belongsTo(Detailticket::class,'ticket_id','id');
    }

    public function Client()
    {
        return $this->belongsTo(Client::class,'client_id','id');
    }
    public function Agent()
    
    {
        return $this->belongsTo(User::class,'agent_id','id');
    }

    public function Lokasi()
    {
        return $this->belongsTo(Lokasi::class,'lokasi','id');
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($ticket) {
            $lastTicket = Ticket::orderBy('id', 'desc')->first();

            if (!$lastTicket) {
                $sequence = 1;
            } else {
                $sequence = intval(substr($lastTicket->no_ticket, strrpos($lastTicket->no_ticket, '-') + 1)) + 1;
            }

            $ticket->no_ticket = 'TO' . date('Ymd') . '-' . str_pad($sequence, 4, '0', STR_PAD_LEFT);
        });
    }
}
