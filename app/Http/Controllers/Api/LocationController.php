<?php

namespace App\Http\Controllers\Api;

use App\Models\Children;
use App\Models\Location;
use App\Models\Tutor;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LocationController extends BaseController
{
    /**
     * This endpoint is for store coordinates of a kid
     */
    public function getLocationXKid($kidId)
    {
        $kid = Children::findOrFail($kidId);
        $tutor = Tutor::find($kid->tutor_id);

        if (Auth::user()->id == $tutor->user_id) {
            $locations = Location::where(['children_id' => $kid->id])->get();

            return $this->sendResponse($locations, "List of locations");
        }

        return $this->sendError("No Content.", 204);
    }

    /**
     * This endpoint is for save coordinates send from app kid
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coordinates' => 'required|string|max:800',
            'date' => 'required|date',
            'time' => 'required',
            'children_id' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $kid = Children::findOrFail($request->children_id);
        $tutor = Tutor::find($kid->tutor_id);

        if (Auth::user()->id == $tutor->user_id) {
            $location = Location::create($request->all());

            return $this->sendResponse($location, "Location saved successfully");
        }

        return $this->sendError("No Content.", 204);
    }

    public function getLatLongArray(Request $request)
    {
        $locationIds = $request->locations;
        $latLongArray = [];

        foreach ($locationIds as $locationId) {
            $location = Location::find($locationId);
            if ($location) {
                $coordinates = $location->coordinates;
                $pattern = '/latitud:\s*([\d.-]+),\s*longitud:\s*([\d.-]+)/';
                preg_match($pattern, $coordinates, $matches);
                if (count($matches) >= 3) {
                    $latitude = $matches[1];
                    $longitude = $matches[2];
                    $latLongArray[] = ['latitude' => $latitude, 'longitude' => $longitude];
                }
            }
        }

        return $latLongArray;
    }

    public function getLocationXKidDate($kidId)
    {
        $kid = Children::findOrFail($kidId);
        $tutor = Tutor::find($kid->tutor_id);

        if (Auth::user()->id == $tutor->user_id) {
            // $locations = Location::where('children_id', $kid->id)
            //     ->orderBy('date', 'asc')
            //     ->get()
            //     ->groupBy('date')
            //     ->map(function ($group) {
            //         return $group->map(function ($location) {
            //             $aux= explode(",", $location->coordinates);
            //             return [
            //                 'time' => $location->time,
            //                 'date' => $location->date,
            //                 // 'longitude' => $location->coordinates,
            //                 'longitude' => substr($aux[0], 1),
            //                 // 'latitude' => $aux[1],
            //                 'latitude' => substr($aux[1], 0, -1)

            //             ];
            //         });
            //     });

            $locations = Location::where('children_id', $kid->id)
                ->orderBy('date', 'asc')
                ->get();

            $modifiedLocations = $locations->map(function ($location) {
                $aux = explode(",", $location->coordinates);
                return [
                    'id' => $location->id,
                    'time' => $location->time,
                    'date' => $location->date,
                    'longitude' => substr($aux[0], 1),
                    'latitude' => substr($aux[1], 0, -1)
                ];
            });
            return $this->sendResponse($modifiedLocations, "List of locations grouped by date");
        }

        return $this->sendError("No Content.", 204);
    }
}
