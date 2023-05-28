<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    use HasFactory;
    protected $fillable = [
        'received',
        'date',
        'duration',
        'contact_id',
    ];

    public function contacts()
    {
        return $this->belongsTo('App\Models\contacts');
    }
}
