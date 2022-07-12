<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termin extends Model
{
    use HasFactory;

    protected $fillable = [
        'vrijeme_termina',
        'datum_termina',
        'kontakt',
        'service_type_id',
        'salon_id',
        'user_id',
    ];
}
