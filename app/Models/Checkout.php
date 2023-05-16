<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'ticket_id',
        'is_checkin'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
