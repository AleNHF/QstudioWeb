<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'path',
        'url',
        'contentData',
        'type',
        'children_id',
    ];

    public function getContentFilter($childId, $startDate, $endDate)
    {
        $contents = Content::where('children_id', '=', $childId)
            ->whereBetween('date', [$startDate, $endDate])
            ->orderBy('date', 'asc')
            ->get()
            ->groupBy('date')
            ->map(function ($group) {
                return $group->map(function ($content) {
                    return [
                        'path' => $content->path,
                        'url' => $content->url,
                        'contentData' => $content->contentData,
                        'type' => $content->type
                    ];
                });
            });

        return $contents;
    }
}