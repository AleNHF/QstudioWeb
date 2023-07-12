<?php

namespace App\Http\Livewire;

use App\Models\Location;
use Livewire\Component;

class LocationComponet extends Component
{
    public $child, $locations, $existe,$fechaInicio, $fechaFin,$horaInicio,$horaFin;
    public $lat = -25.344;
    public $lng = 131.031;

    public function render()
    {
        $locations = $this->getCoordinates();

        return view('livewire.location-componet', [
            'locations' => $locations,
        ])->extends('layouts.app');
    }

    public function mount($child)
    {
        $this->child = $child;
    }

    public function getCoordinates()
    {
        $this->locations = Location::where('children_id', $this->child)->get();
        $query = Location::where('children_id', $this->child);
        if ($this->fechaInicio) {
            $query->where('date', '>=', $this->fechaInicio);
        }
    
        if ($this->fechaFin) {
            $query->where('date', '<=', $this->fechaFin);
        }
    
        if ($this->horaInicio) {
            $query->whereTime('time', '>=', $this->horaInicio);
        }
    
        if ($this->horaFin) {
            $query->whereTime('time', '<=', $this->horaFin);
        }
    
        $this->locations = $query->get();

        $this->existe = 'true';

        if ($this->locations->isEmpty()) {
            $this->existe = 'falso';
        }

        if ($this->locations) {
            foreach ($this->locations as $location) {
                // Extraer los valores de longitud y latitud
                $pattern = '/longitud:\s*([\d.-]+),\s*latitud:\s*([\d.-]+)/';
                preg_match($pattern, $location->coordinates, $matches);

                if (isset($matches[1]) && isset($matches[2])) {
                    $longitud = $matches[1];
                    $latitud = $matches[2];

                    // Agregar las variables de longitud y latitud al objeto $location
                    $location->lat = $latitud;
                    $location->lng = $longitud;
                } else {
                    echo "No se encontraron los valores de longitud y latitud.";
                }
            }
        }

        //dd($this->locations);
        return $this->locations;
    }

}