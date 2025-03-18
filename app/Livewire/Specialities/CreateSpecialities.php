<?php

namespace App\Livewire\Specialities;

use App\Models\Speciality;
use Livewire\Component;

class CreateSpecialities extends Component
{


    public $name;
    public $description;



    protected $rules = [
        'name' => 'required|string',
        'description' => 'required|string',
    ];




    public function render()
    {
        return view('livewire.specialities.create-specialities');
    }


    public function createNewSpecialities()
    {
        $datos = $this->validate();

        Speciality::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('alerta', 'Creado correctamente.');
        return redirect()->route('specialities.index');
    }
}
