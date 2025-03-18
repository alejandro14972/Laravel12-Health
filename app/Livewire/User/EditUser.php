<?php

namespace App\Livewire\User;

use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\User;
use App\Notifications\ProfileUpdated;
use Livewire\Component;
use PhpParser\Comment\Doc;
use Spatie\Permission\Models\Role;

class EditUser extends Component
{
    public $user_id, $name, $surname, $email, $dni, $adress, $password, $gender, $birthdate, $phone, $role, $roleId, $speciality;

    protected $rules = [
        'name' => 'required|min:3',
        'surname' => 'required|min:3',
        'email' => 'required|email',
        'dni' => 'required|regex:/[0-9]{8}[A-Za-z]{1}/',
        'adress' => 'required|min:10',
        'password' => 'required|min:8',
        'birthdate' => 'required|date|before:today',
        'gender' => 'required',
        'phone' => 'required|regex:/[0-9]{9}/',
        'role' => 'required|exists:roles,name',

    ];

    public function mount(User $user)
    {
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->surname = $user->surname;
        $this->email = $user->email;
        $this->dni = $user->dni;
        $this->adress = $user->adress;
        $this->password = $user->password;
        $this->gender = $user->gender;
        $this->birthdate = $user->birthdate;
        $this->phone = $user->phone;
        $this->role = $user->getRoleNames()->first();
        $this->roleId = $user->role;

        //dd($this->role);

        if ($this->role == 'doctor') {
            $this->speciality = $user->doctor->speciality_id;
        }

        //dd($this->speciality);
    }

    public function render()
    {
        $roles = Role::all();
        $specialities = Speciality::all();
        return view('livewire.user.edit-user', [
            'roles' => $roles,
            'specialities' => $specialities,
        ]);
    }

    public function updateUser()
    {
        $datos =  $this->validate();
        $user = User::find($this->user_id);

        //dd($this->speciality);

        $user->name = $datos['name'];
        $user->surname = $datos['surname'];
        $user->email = $datos['email'];
        $user->dni = $datos['dni'];
        $user->adress = $datos['adress'];
        $user->password = $datos['password'];
        $user->gender = $datos['gender'];
        $user->birthdate = $datos['birthdate'];
        $user->phone = $datos['phone'];
        $user->role = $datos['role'];

        if ($user->role == 'doctor') {

            $doctor = Doctor::where('user_id', $user->id)->first();

            if ($doctor) {
                $doctor->update([
                    'speciality_id' => $this->speciality
                ]);
            } else {
                Doctor::create([
                    'user_id' => $user->id,
                    'speciality_id' => $this->speciality
                ]);
            }
        } else {
            //si el usuario paso de ser doctor a paciente
            Doctor::where('user_id', $user->id)->delete();
        }


        //save
        $user->save();

        //sync roles
        $user->syncRoles($this->role);

        $user->notify(new ProfileUpdated());

        // Mensaje de éxito
        session()->flash('alerta', '¡Usuario editado con éxito!.');
        return redirect()->route('users.index');
    }
}
