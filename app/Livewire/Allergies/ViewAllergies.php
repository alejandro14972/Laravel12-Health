<?php

namespace App\Livewire\Allergies;

use Livewire\Component;

class ViewAllergies extends Component
{
    public function render()
    {
        $allergies = \App\Models\allergie::all();
        return view('livewire.allergies.view-allergies', ['allergies' => $allergies]);
    }
}
