<?php

namespace App\Livewire\Specialities;

use App\Models\Speciality;
use Livewire\Component;

class EditSpecialities extends Component
{


    public $name;
    public $description;
    public $speciality_id;

    protected $rules = [
        'name' => 'required|string',
        'description' => 'required|string',
    ];


    public function mount(Speciality $speciality)
    {
        $this->name = $speciality->name;
        $this->description = $speciality->description;
        $this->speciality_id = $speciality->id;
    }

    public function render()
    {
        return view('livewire.specialities.edit-specialities');
    }

    public function editSpeciality(){
        $datos = $this->validate();

        $speciality = Speciality::find($this->speciality_id);
        $speciality->name = $datos['name'];
        $speciality->description = $datos['description'];
        $speciality->save();
        session()->flash('alerta', 'Actualizado correctamente.');
        return redirect()->route('specialities.index');
    }
}
