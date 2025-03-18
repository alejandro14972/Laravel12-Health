<?php

namespace App\Livewire\Specialities;

use App\Models\Speciality;
use Livewire\Attributes\On;
use Livewire\Component;

class ViewSpecialities extends Component
{

    #[On('deletespeciality')]
    public function deletespeciality($specialityId)
    {
        $especiliadad = Speciality::find($specialityId);
        $elemteoBorrado = $especiliadad[0];
        $elemteoBorrado->delete();
    }


    public function render()
    {
        $specialities = Speciality::all();
        return view('livewire.specialities.view-specialities', ['specialities' => $specialities]);
    }
}
