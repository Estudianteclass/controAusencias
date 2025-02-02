<?php

namespace App\Livewire;

use App\Models\Department;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DepartmentComponent extends Component
{
    public $id;
    public $dep_name;
    public $departments = [];
    public $createModal = false;
    public $editModal = false;
    public $departmentEdit = false;
    public function mount()
    {
        $this->getDepartments();
    }


    public function render()
    {
        return view('livewire.department-component');
    }

    public function getDepartments()
    {

        $this->departments = Department::all();
    }
    public function clearFields()
    {
        $this->dep_name = '';
    }
    public function openCreateModal()
    {
        $this->createModal = true;
    }

    public function closeCreateModal()
    {
        $this->createModal = false;
    }

    public function openEditModal($id)
    {
        $this->editDepartment($id);
        $this->editModal = true;
    }
    public function closeEditModal()
    {
        $this->editModal = false;
    }
    public function createDepartment()
    {

        $department = new Department();
        $department->dep_name = $this->dep_name;
        $department->save();
        $this->clearFields();
        $this->getDepartments();
        $this->closeCreateModal();
    }
    public function editDepartment($id)
    {

        $department = Department::find($id);
        if ($department) {
            $this->id = $department->id;
            $this->dep_name = $department->dep_name;
            $this->departmentEdit = true;
        }
    }
    public function updateDepartment()
    {
        $department = Department::find($this->id);
        $department->update([
            'dep_name' => $this->dep_name,

        ]);
        $this->departmentEdit = false;
        $this->getDepartments();
        $this->clearFields();
        $this->closeEditModal();
    }
    public function deleteDepartment($departmentId)
    {
        $department = Department::find($departmentId);
        if ($department) {
            $department->delete();
            $this->getDepartments();
        }
    }
}
