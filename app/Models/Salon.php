<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    use HasFactory;

    protected $fillable = [
        'naziv',
        'lokacija',
        'kontakt',
        'user_id',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'salon_id', 'id');
    }
}
