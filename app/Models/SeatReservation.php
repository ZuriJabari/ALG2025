<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', 'sector', 'email', 'phone', 'is_fellow', 'fellowship',
    ];
}
