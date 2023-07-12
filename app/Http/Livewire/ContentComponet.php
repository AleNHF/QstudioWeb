<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Content;

use App\Models\Children;

class ContentComponet extends Component
{   public $child;
    public $msj;
    public $contentChild;
    public $ids=0;
    public $children;
    public $fechaInicio;
    public $fechaFin;
    public $selectedContent;
    public $showModal = false;

    public $nameData=array(
        'Nudity'=>'Desnudez',
        'Graphic Male Nudity'=>'Desnudez Masculina Gráfica',
        'Graphic Female Nudity'=>'Desnudez femenina gráfica',
        'Sexual Activity'=>'Actividad Sexual',
        'Illustrated Explicit Nudity'=>'Desnudez explícita ilustrada',
        'Adult Toys'=>'Juguetes para adultos',
        'Female Swimwear Or Underwear'=>'Ropa interior femenino',
        'Male Swimwear Or Underwear'=>'Ropa interior masculino',
        'Partial Nudity'=>'Desnudez parcial',
        'Barechested Male'=>'Hombre con el torso desnudo',
        'Revealing Clothes'=>'Atuendo revelador',
        'Sexual Situations'=>'Situaciones Sexuales',
        'Graphic Violence Or Gore'=>'Violencia Gráfica O Gore',
        'Physical Violence'=>'Violencia física',
        'Weapon Violence'=>'Violencia con armas',
        'Weapons'=>'armas',
        'Self Injury'=>'Auto lastimarse',
        'Emaciated Bodies'=>'Cuerpos demacrados',
        'Corpses'=>'Cuerpos',
        'Hanging'=>'Colgante',
        'Air Crash'=>'Accidente aéreo',
        'Explosions And Blasts'=>'Explosiones y explosiones',
        'Middle Finger'=>'Dedo del medio',
        'Drug Products'=>'Productos farmacéuticos',
        'Drug Use'=>'El consumo de drogas',
        'Pills'=>'Pastillas',
        'Drug Paraphernalia'=>'Parafernalia de drogas',
        'Tobacco Products'=>'Productos de tabaco',
        'Smoking'=>'Fumar',
        'Drinking'=>'Bebiendo',
        'Alcoholic Beverages'=>'Bebidas alcohólicas',
        'Gambling'=>'Juego',
        'Nazi Party'=>'Fiesta nazi',
        'White Supremacy'=>'La supremacía blanca',
        'Extremist'=>'Extremista',
        );
       public $parentNameData=array(
        'Explicit Nudity'=>'Desnudez explícita',
        'Suggestive'=>'Sugestivo',
        'Violence'=>'Violencia',
        'Visually Disturbing'=>'Visualmente perturbador',
        'Rude Gestures'=>'gestos groseros',
        'Drugs'=>'drogas',
        'Tobacco'=>'Tabaco',
        'Alcohol'=>'Alcohol',
        'Gambling'=>'Juego',
        'Hate Symbols'=>'Símbolos de odio',
        );

    protected $listeners = ['logro10'];

    public function render()
    {  
        return view('livewire.content-componet')->extends('layouts.app');
    }

    public function mount($child)
    {
        $this->child = $child;
        $this->children=Children::where('id',$this->child)->first();
        $this->contentChild=Content::where('children_id',$this->child)->get();
       // $this->store();
    }

    public function store(){
       /*  $this->children=Children::where('id',$this->child)->first();
        $this->contentChild=Content::where('children_id',$this->child)->get();
         */
        $this->children=Children::where('id',$this->child)->first();
        $query = Content::query();

        // Verifica si se ha seleccionado una fecha de inicio
        if (!empty($this->fechaInicio)) {
            $fechaInicio = date('Y-m-d 00:00:00', strtotime($this->fechaInicio));
            $query->where('date', '>=', $fechaInicio);

        }
    
        // Verifica si se ha seleccionado una fecha de fin
        if (!empty($this->fechaFin)) {
            $fechaFin = date('Y-m-d 23:59:59', strtotime($this->fechaFin));
            $query->where('date', '<=', $fechaFin);
        }
    
        // Filtra por el ID del niño
        $query->where('children_id', $this->child);
    
        $this->contentChild = $query->get();

    }


   

public function openModal($contentId)
{  
    $content = Content::where('id',$contentId)->first();
  
    if ($content) {
        $this->selectedContent = $content;
    } else {
        $this->selectedContent = null;
    }
    $this->showModal = true;
 
}

    public function logro10()
    {
        $this->msj='hola';
    }

}
