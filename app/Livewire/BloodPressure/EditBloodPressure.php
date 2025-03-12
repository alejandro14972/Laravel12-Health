<?php

namespace App\Livewire\BloodPressure;

use App\Models\BloodPressure;
use Livewire\Component;

class EditBloodPressure extends Component
{

    public $pressureID, $user_id, $systolic, $diastolic, $pulse, $date, $time, $toma, $notes;

    protected $rules = [
        'user_id' => 'required|integer',
        'systolic' => 'required|integer',
        'diastolic' => 'required|integer',
        'pulse' => 'required|integer',
        'date' => 'required|date',
        'time' => 'required',
        'toma' => 'required',
        'notes' => 'nullable',
    ];


    public function mount (BloodPressure $bloodPressure){
        $this->pressureID = $bloodPressure->id;
        $this->user_id = $bloodPressure->user_id;
        $this->systolic = $bloodPressure->systolic;
        $this->diastolic = $bloodPressure->diastolic;
        $this->pulse = $bloodPressure->pulse;
        $this->date = $bloodPressure->date;
        $this->time = $bloodPressure->time;
        $this->toma = $bloodPressure->toma;
        $this->notes = $bloodPressure->notes;
    }


    public function render()
    {
        return view('livewire.blood-pressure.edit-blood-pressure');
    }


   public function updateBloodPressure() {
    $datos = $this->validate();
    
    //buscar el id del bloodPressure y actualizarlo
    $bloodPressure = BloodPressure::find($this->pressureID);
    
    $bloodPressure->systolic = $datos['systolic']; 
    $bloodPressure->diastolic = $datos['diastolic'];
    $bloodPressure->pulse = $datos['pulse'];
    $bloodPressure->date = $datos['date'];
    $bloodPressure->time = $datos['time'];
    $bloodPressure->toma = $datos['toma'];
    $bloodPressure->notes = $datos['notes'];


    $bloodPressure->save();

    // Mensaje de éxito
    session()->flash('alerta', '¡Editado con éxito!.');
    return redirect()->route('blood-presures.index');

   }
}
