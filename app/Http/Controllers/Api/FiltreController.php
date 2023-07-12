<?php

namespace App\Http\Controllers\Api;

use App\Models\Call;
use App\Models\Children;
use App\Models\Content;
use App\Models\File;
use App\Models\Location;
use App\Models\Tutor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FiltreController extends BaseController
{
    /**
     * This endpoint is for location list into the app tutor with filters
     */
    public function getLocationsFilter(Request $request, $kidId)
    {
        $kid = Children::findOrFail($kidId);
        $tutor = Tutor::find($kid->tutor_id);

        $startDate = $request->query('startDate');
        $endDate = $request->query('endDate');

        // Validación de fechas
        $validator = Validator::make($request->all(), [
            'startDate' => 'required|date_format:d-m-Y',
            'endDate' => 'required|date_format:d-m-Y',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Invalid date format.', 400);
        }

        $startDate = Carbon::createFromFormat('d-m-Y', $startDate)->format('Y-m-d');
        $endDate = Carbon::createFromFormat('d-m-Y', $endDate)->format('Y-m-d');

        if (Auth::user()->id == $tutor->user_id) {
            $locations = Location::where('children_id', $kid->id)
                ->whereBetween('date', [$startDate, $endDate])
                ->orderBy('date', 'asc')
                ->get()
                ->groupBy('date')
                ->map(function ($group) {
                    return $group->map(function ($location) {
                        return [
                            'time' => $location->time,
                            'longitude' => $location->lng,
                            'latitude' => $location->lat,
                        ];
                    });
                });

            return $this->sendResponse($locations, "List of locations grouped by date");
        }

        return $this->sendError("No Content.", 204);
    }

    /**
     * This endpoint is for calls list into the app tutor with filters
     */
    public function getCallsFilter(Request $request, $kidId)
    {
        $startDate = $request->query('startDate');
        $endDate = $request->query('endDate');

        // Validación de fechas
        $validator = Validator::make($request->all(), [
            'startDate' => 'required|date_format:d-m-Y',
            'endDate' => 'required|date_format:d-m-Y',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Invalid date format.', 400);
        }

        $startDate = Carbon::createFromFormat('d-m-Y', $startDate)->format('Y-m-d');
        $endDate = Carbon::createFromFormat('d-m-Y', $endDate)->format('Y-m-d');

        $callModel = new Call();
        $calls = $callModel->getCallsxChildFilter($kidId,$startDate,$endDate);

        if (isset($calls)) {
            return $this->sendResponse($calls, 'Listado de llamadas por niño');
        }
       
        return $this->sendError('Algo salió mal');
    }

    /**
     * This endpoint is for calls list into the app tutor with filters
     */
    public function getContentsFilter(Request $request, $kidId)
    {
        $startDate = $request->query('startDate');
        $endDate = $request->query('endDate');

        // Validación de fechas
        $validator = Validator::make($request->all(), [
            'startDate' => 'required|date_format:d-m-Y',
            'endDate' => 'required|date_format:d-m-Y',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Invalid date format.', 400);
        }

        $startDate = Carbon::createFromFormat('d-m-Y', $startDate)->format('Y-m-d');
        $endDate = Carbon::createFromFormat('d-m-Y', $endDate)->format('Y-m-d');

        $contentModel = new Content();
        $contents = $contentModel->getContentFilter($kidId,$startDate,$endDate);

        if (isset($contents)) {
            return $this->sendResponse($contents, 'Listado de contenidos por niño');
        }
       
        return $this->sendError('Algo salió mal');
    }
}