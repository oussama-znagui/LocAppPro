<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{

    use HasFactory;

    protected $fillable = [
        'adresse',
        'size',
        'rooms',
        'floor',
        'rent',
        
    ];
    public function leases()
    {
        return $this->hasMany(Lease::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

}
