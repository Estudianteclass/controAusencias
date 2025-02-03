<?php

namespace App\Livewire;

use App\Models\Absence;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AbsenceComponent extends Component
{

    public $verDepartamentos = true;
    public $absences = [];
    public $user;
    public $absence;
    public $description;
    public $absence_date;
    public $department;
    public $hour;
    public $turn;
    public $usersDep = [];
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
    public $selectedDate;

    public function mount()
    {
        $this->showToday();
        $this->departments = $this->getDepartments();
        $this->filterByDepartment();
    }
    public function render()
    {



        return view('livewire.absence-component');
    }

    //uso de eloquent da problemas
public function showToday(){
    $this->absences = DB::table('absences')
    ->join('users', 'absences.user_id', '=', 'users.id')
    ->join('departments', 'departments.id', '=', 'users.department_id')
    ->select('absences.id as absence_id', 'users.id as user_id', 'departments.id as department_id', 'absences.*', 'users.*', 'departments.*')
    ->whereDate('absences.absence_date', '=', date('y-m-d'))
    ->get();
}
    ////funciones de prueba


    public function filterByDepartment()
    {
        $this->usersDep = User::with('department')->get();
    }

    public function openDepartments()
    {
        $this->verDepartamentos = true;
    }


    public function filterByDate()
    {

        if ($this->selectedDate == 'todas') {
            $this->getAbsencesDepsTeachers();
        } else if ($this->selectedDate == 'hoy') {
            $this->absences = DB::table('absences')
                ->join('users', 'absences.user_id', '=', 'users.id')
                ->join('departments', 'departments.id', '=', 'users.department_id')
                ->select('absences.id as absence_id', 'users.id as user_id', 'departments.id as department_id', 'absences.*', 'users.*', 'departments.*')
                ->whereDate('absences.absence_date', '=', date('y-m-d'))
                ->get();
        } else if ($this->selectedDate == 'mias') {
            $this->absences = DB::table('absences')
            ->join('users', 'absences.user_id', '=', 'users.id')
            ->join('departments', 'departments.id', '=', 'users.department_id')
            ->select('absences.id as absence_id', 'users.id as user_id', 'departments.id as department_id', 'absences.*', 'users.*', 'departments.*')
            ->where('user_id', '=', auth()->id())
            ->get();
        } else {
            $this->absences = DB::table('absences')
                ->join('users', 'absences.user_id', '=', 'users.id')
                ->join('departments', 'departments.id', '=', 'users.department_id')
                ->select('absences.id as absence_id', 'users.id as user_id', 'departments.id as department_id', 'absences.*', 'users.*', 'departments.*')
                ->whereDate('absences.absence_date', '=', $this->selectedDate)
                ->get();
        }
    }

    public function showAllAbsences()
    {
        $this->absences = DB::table('absences')
            ->join('users', 'absences.user_id', '=', 'users.id')
            ->join('departments', 'departments.id', '=', 'users.department_id')
            ->select('absences.id as absence_id', 'users.id as user_id', 'departments.id as department_id', 'absences.*', 'users.*', 'departments.*')
            ->get();
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


        $absence = new Absence();
        $absence->description = $this->description;
        $absence->user_id = $this->user_id;
        $absence->hour = $this->hour;
        $absence->turn = $this->turn;
        $absence->absence_date = $this->absence_date;
        $absence->save();
        $this->clearFields();
        $this->getAbsencesDepsTeachers();
        $this->closeAbsenceForm();
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
        $this->user_id = '';
        $this->description = '';
    }


    public function editAbsence($id)
    {

        $absence = Absence::find($id);
        if ($absence) {
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
            'absence_date' => Carbon::createFromFormat('d-m-Y', $this->absence_date)->format('Y-m-d'),
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
        $this->filterByDepartment();
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
//functiones solo para usuario profesor, solo puede crear faltas para si mismo

public function createMyAbsence()
{


    $absence = new Absence();
    $absence->description = $this->description;
    $absence->user_id = auth()->id();
    $absence->hour = $this->hour;
    $absence->turn = $this->turn;
    $absence->absence_date = $this->absence_date;
    $absence->save();
    $this->clearFields();
    $this->getAbsencesDepsTeachers();
    $this->closeAbsenceForm();
}
public function updateMyAbsence(){
    $absence = Absence::find($this->absence_id);

        $absence->update([
            'description' => $this->description,
            'hour' => $this->hour,
            'turn' => $this->turn,
            'absence_date' => Carbon::createFromFormat('d-m-Y', $this->absence_date)->format('Y-m-d'),
            'user_id' =>auth()->id(),
        ]);
        $this->editAbsence = false;
        $this->getMyAbscences();
        $this->closeEditAbsenceForm();
        $this->clearFields();
}

public function getMyAbscences(){

    $this->absences = DB::table('absences')
    ->join('users', 'absences.user_id', '=', 'users.id')
    ->join('departments', 'departments.id', '=', 'users.department_id')
    ->select('absences.id as absence_id', 'users.id as user_id', 'departments.id as department_id', 'absences.*', 'users.*', 'departments.*')
    ->where('user_id', '=', auth()->id())
    ->get();
}
}






