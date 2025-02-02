<?php

namespace App\Livewire;

use App\Models\Absence;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AbsenceComponent extends Component
{
    public $mostrar = true;
    public $verDepartamentos=true;
    public $absences = [];
    public $user;
    public $absence;
    public $description;
    public $absence_date;
    public $department;
    public $hour;
    public $turn;
    public $user_id;
    public $absenceForm = false;
    public $absence_id;
    public $teacher_absences = [];
    public $name;
    public $lastName;
    public $departments = [];
    public $hours = [];
    public $turns = [];
    public $date;
    public $editAbsence = false;
    public function mount()
    {

        $this->departments = $this->getDepartments();
    }
    public function render()
    {


        $this->getAbsencesDepsTeachers();
        return view('livewire.absence-component');
    }

    ////funciones de prueba
    public function openMostrar()
    {
        $this->mostrar = true;
    }
    public function closeMostrar()
    {
        $this->mostrar = false;
    }



    public function openDepartments()
    {
        $this->verDepartamentos = true;
    }
    public function closeDepartments()
    {
        $this->mostrar = false;
    }



    public function getAbsencesDepsTeachers()
    {

        $this->absences = DB::table('absences')
            ->join('users', 'absences.user_id', '=', 'users.id')
            ->join('departments', 'departments.id', '=', 'users.department_id')
            ->select('absences.id as absence_id', 'users.id as user_id', 'departments.id as department_id', 'absences.*', 'users.*', 'departments.*')
            ->get();
    }

    public function createAbsence()
    {
        $name = $this->name;
        $user = User::where('name', '=', $name)->first();


        if ($user) {
            $absence = new Absence();
            $absence->description = $this->description;
            $absence->user_id = $user->id;
            $absence->hour = $this->hour;
            $absence->turn = $this->turn;
            $absence->absence_date = $this->absence_date;
            $absence->save();
            $this->clearFields();
            $this->getAbsencesDepsTeachers();
            $this->closeAbsenceForm();
        }
    }
    public function getDepartments()
    {
        $this->departments = DB::table('departments')->select('dep_name')->get();
    }
    public function clearFields()
    {
        $this->absence_date = '';
        $this->department = '';
        $this->hour = '';
        $this->turn = '';
        $this->name = '';
        $this->description = '';
    }


    public function editAbsence($id)
    {

        $absence = Absence::find($id);
        if ($absence) {
            $user = User::with('absences')->where('id', '=', $absence->user_id)->first();
            $this->name = $user->name;
            $this->absence_id = $absence->id;
            $this->description = $absence->description;
            $this->hour = $absence->hour;
            $this->turn = $absence->turn;
            $this->absence_date = Carbon::parse($absence->absence_date)->format('d-m-Y');
            $this->user_id = $absence->user_id;
            $this->editAbsence = true;
        }
    }
    public function updateAbsence()
    {
        //$user = auth()->id();

        $absence = Absence::find($this->absence_id);

        $absence->update([
            'description' => $this->description,
            'hour' => $this->hour,
            'turn' => $this->turn,
            'absence_date' => $this->absence_date,
            'user_id' => $this->user_id,
        ]);
        $this->editAbsence = false;
        $this->getAbsencesDepsTeachers();
        $this->closeEditAbsenceForm();
        $this->clearFields();
    }
    public function displayTeachersAbsences()
    {
        $this->teacher_absences = Absence::with('user')->where('user_id', '=', auth()->id())->get();
    }


    public function openAbsenceForm()
    {

        $this->absenceForm = true;
    }
    public function closeAbsenceForm()
    {

        $this->absenceForm = false;
    }

    public function openEditAbsenceForm($id)
    {
        $this->editAbsence($id);
        $this->editAbsence = true;
    }
    public function closeEditAbsenceForm()
    {

        $this->editAbsence = false;
    }


    public function deleteAbsence($absenceId)
    {
        $absence = Absence::find($absenceId);
        if ($absence) {
            $absence->delete();
            $this->getAbsencesDepsTeachers();
        }
    }

    public function getAbsences()
    {
        $this->absences = DB::table('absences')->get();
    }
}
