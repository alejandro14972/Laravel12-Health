<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ViewUsers extends Component
{

    #[On('deleteUser')]
    public function deleteUser($userId)
    {
        $user = User::find($userId);
        $elemteoBorrado = $user[0];
        $elemteoBorrado->delete();
    }


    public function render()
    {
        $users = User::all();
        return view('livewire.user.view-users', compact('users'));
        
    }
}
