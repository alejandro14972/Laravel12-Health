<?php

namespace App\Livewire\User;

use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class CreateUser extends Component
{
    public $id, $name, $surname, $email, $dni, $adress, $password, $gender, $birthdate, $phone, $role, $speciality;
    public $roles, $specialities;

    use WithFileUploads;

    protected $rules = [
        'name' => 'required|min:3',
        'surname' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'dni' => 'required|unique:users|regex:/[0-9]{8}[A-Za-z]{1}/',
        'adress' => 'required|min:10',
        'password' => 'required|min:8',
        'birthdate' => 'required|date|before:today',
        'gender' => 'required',
        'phone' => 'required|regex:/[0-9]{9}/',
        'role' => 'required|exists:roles,name',
    ];

    public function mount()
    {
        $this->roles = Role::all();
        $this->specialities = Speciality::all();
        $this->password = Str::random(10);

        //desactivar en un futuro
        $this->name = fake()->name();
        $this->surname = fake()->lastName();
        $this->email = fake()->unique()->safeEmail();
        $this->dni = fake()->numerify('########X');
        $this->adress = fake()->address();
        $this->birthdate = fake()->date();
        $this->phone = fake()->numerify('#########');
        $this->role = $this->roles->last()->name;
        $this->gender = "Hombre";
    }

    public function createNewUser()
    {
        // Validar datos
        $validatedData = $this->validate();

        // Crear el usuario
        $user = User::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'dni' => $this->dni,
            'adress' => $this->adress,
            'password' => Hash::make($this->password),
            'birthdate' => $this->birthdate,
            'gender' => $this->gender,
            'phone' => $this->phone,
            'role' => $this->role,
        ]);

        // Asignar rol al usuario
        $user->assignRole($this->role);


        if ($this->role == 'doctor') {
            Doctor::create([
                'user_id' => $user->id,
                'speciality_id' => $this->speciality
            ]);
        }

        // Mensaje de éxito
        session()->flash('message', 'Usuario creado correctamente.');

        event(new Registered($user));

        // Redirigir a la lista de usuarios
        //crear mensaje de exito
        session()->flash('alerta', '¡Usuario creado con éxito!. La contraseña del usuario es: ' .$this->password);
        return redirect()->route('users.index');
    }

    public function render()
    {
        return view('livewire.user.create-user');
    }
}
