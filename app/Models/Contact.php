<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phoneNumber',
        'children_id',
    ];

    public function children()
    {
        return $this->belongsTo(Children::class, 'children_id');
    }
    public function calls(){
        return $this->hasMany(Call::class,'contact_id');
    }
}
