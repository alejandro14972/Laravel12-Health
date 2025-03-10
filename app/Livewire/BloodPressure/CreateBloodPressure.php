<?php

namespace App\Livewire\BloodPressure;

use App\Models\BloodPressure;
use Doctrine\Inflector\Rules\English\Rules;
use Livewire\Component;

class CreateBloodPressure extends Component
{
    public $user_id, $systolic, $diastolic, $pulse, $date, $time, $toma, $notes;

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

    public function mount()
    {
        $this->user_id = auth()->user()->id;
        $this->diastolic = 80;
        $this->systolic = 120;
        $this->pulse = 60;
        $this->notes = 'Sin notas';
        $this->date = '2025-03-04';
        $this->time = 'evening';
        $this->toma = '1';
    }

    public function render()
    {
        return view('livewire.blood-pressure.create-blood-pressure');
    }

    public function createNewBloodPressure()
    {
        $datos = $this->validate();

        $bloodPressure = BloodPressure::create([
            'user_id' => auth()->user()->id,
            'systolic' => $this->systolic,
            'diastolic' => $this->diastolic,
            'pulse' => $this->pulse,
            'date' => $this->date,
            'time' => $this->time,
            'toma' => $this->toma,
            'notes' => $this->notes,
            ]);

            session()->flash('alerta', 'Creado correctamente.');
            return redirect()->route('blood-presures.index');
    }
}
