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

    public function getCallsxChild($childId) {
        $calls = Contact::join('calls', 'calls.contact_id', '=', 'contacts.id')
            ->join('children', 'children.id', '=', 'contacts.children_id')
            ->where('contacts.children_id', '=', $childId)
            ->orderBy('calls.date', 'asc')
            ->select('calls.*', 'contacts.*')
            ->get()
            ->groupBy(function ($call) {
                return $call->date->format('Y-m-d');
            });
    
        return $calls;
    }
    
}