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

    public function salons()
    {
        return $this->hasOne(Salon::class, 'id', 'salon_id');
    }

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function types()
    {
        return $this->hasOne(ServiceType::class, 'id', 'service_type_id');
    }
}
