<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserManagement extends Component
{
    public $name;
    public $user_id;
    public $last_name;
    public $department_id;
    public $department_name;
    public $email;
    public $password;
    public $users = [];
    public $createModal = false;
    public $editModal = false;
    public $userEdit = false;
    public $departments = [];
    public $role;

     public function mount(){
        $this->getDepartments();
        $this->getUsersDeps();
    }

    public function render()
    {
     
        return view('livewire.user-management');
    }
   
    public function getUsersDeps()
    {
        $this->users = User::where('id', '!=', auth()->id())->with('department')->get();

    }
    //crud de usuarios solo para el admin
    public function getDepartments()
    {
        $this->departments = DB::table('departments')->get();
    }
    public function createUser()
    {
        $user = new User();
        $user->name = $this->name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->department_id = $this->department_id;
        $user->save();
        $role=Role::where('name',$this->role)->first();
        if($role){
            $user->assignRole($role);
        }
        $this->clearFields();
        $this->getUsersDeps();
        $this->closeCreateModal();
    }
    public function clearFields()
    {
        $this->name = '';
        $this->last_name = '';
        $this->email = '';
        $this->department_id = '';
        $this->role='';
    }
    public function openCreateModal()
    {

        $this->createModal = true;
    }
    public function closeCreateModal()
    {

        $this->createModal = false;
    }
    public function editUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $this->user_id = $user->id;
            $this->name = $user->name;
            $this->last_name = $user->last_name;
            $this->email =   $user->email;
            $this->department_id = $user->department_id;
            $this->userEdit = true;
        }
    }
    public function updateUser()
    {
        $user = User::find($this->user_id);
        $user->update([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'department_id' => $this->department_id,

        ]);
        $this->userEdit = false;
        $this->getUsersDeps();
         $this->clearFields();
        $this->closeEditModal();
       
    }
    public function openEditModal($id)
    {
        $this->editUser($id);
        $this->editModal = true;
    }
    public function closeEditModal()
    {

        $this->editModal = false;
    }
    public function deleteUser($userId)
    {
        $user = User::find($userId);
        if ($user) {

            $user->delete();
            $this->getUsersDeps();
        }
    }


}
