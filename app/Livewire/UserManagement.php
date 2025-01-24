<?php

namespace App\Livewire;

use Livewire\Component;

class UserManagement extends Component
{
    public $name;
    public $lastname;
    public $phone;
    public $department_id;
    public $department_name;
    public $email;
    public $password;
    public function render()
    {
        return view('livewire.user-management');
    }

    //crud de usuarios solo para el admin
}
