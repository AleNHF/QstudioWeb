<?php

namespace App\Models;

use App\Models\PlanTutor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'birthDay',
        'isActive',
        'phoneNumber',
        'profilePhoto',
        'user_id'
    ];

    public function planesTutor()
    {
        return $this->hasMany(PlanTutor::class,'tutor_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function children()
    {
        return $this->hasMany(Children::class, 'tutor_id');
    }
}
