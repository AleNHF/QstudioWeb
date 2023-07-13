<?php

namespace App\Models;

use Carbon\Carbon;
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
            ->select('calls.*', 'contacts.name',  'contacts.phoneNumber')
            ->get()
            ->groupBy(function ($call) {
                $date = Carbon::parse($call->date);
                return $date->format('Y-m-d');
            });
    
        return $calls;
    }

    public function getCallsxChildFilter($childId,$startDate,$endDate) {
        $calls = Contact::join('calls', 'calls.contact_id', '=', 'contacts.id')
            ->join('children', 'children.id', '=', 'contacts.children_id')
            ->where('contacts.children_id', '=', $childId)
            ->whereBetween('calls.date', [$startDate, $endDate])
            ->orderBy('calls.date', 'asc')
            ->select('calls.*', 'contacts.*')
            ->get()
            ->groupBy(function ($call) {
                $date = Carbon::parse($call->date);
                return $date->format('Y-m-d');
            });
    
        return $calls;
    }
    
}