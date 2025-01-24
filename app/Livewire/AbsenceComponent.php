<?php

namespace App\Livewire;

use App\Models\Absence;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AbsenceComponent extends Component
{
    public $absences = [];
    public $user;
    public $absence;
    public $description;
    public $hour;
    public $turn;
    public $user_id;
    public $absenceForm = false;
    public $absence_id;
    public $teacher_absences=[];
    public $name;
    public function mount(){
        $this->absences=$this->getAbsences();
    }
    public function render()
    {

      //  $this->absences = DB::table('absences')->get();
 
      $this->absences = DB::table('absences')->join('users','absences.user_id','=','users.id')
      ->join('departments','departments.id','=','users.department_id')->select('absences.*','users.*','departments.*')->get();
        return view('livewire.absence-component');
    }
    public function createAbsence()
    {
        $absence = new Absence();
        $absence->description = $this->description;
        $absence->hour = $this->hour;
        $absence->turn = $this->turn;
        $absence->user_id = auth()->id();
        $absence->save();
        $this->getAbsences();
        /*
'description',
        'hour',
        'turn',
        'user_id',

*/
    }
  

    public function updateAbsence()
    {
        $user = auth()->id();

        $absence = Absence::where($this->absence_id);

        $absence->update([
            'description' => $this->description,
            'hour' => $this->hour,
            'turn' => $this->turn,
            'user_id' => $user,
        ]);
        $this->displayTeachersAbsences();
        $this->closeEditAbsenceForm();
        $this->getAbsences();
    }
    public function displayTeachersAbsences()
    {
        $this->teacher_absences = Absence::with('user')->where('user_id','=',auth()->id())->get();
    }

  
    public function openAbsenceForm()
    {

        $this->absenceForm = true;
    }
    public function closeAbsenceForm()
    {

        $this->absenceForm = false;
    }

    public function openEditAbsenceForm()
    {

        $this->absenceForm = true;
    }
    public function closeEditAbsenceForm()
    {

        $this->absenceForm = false;
    }


    public function deleteAbsence(Absence $absence)
    {
        $absence->delete();
        $this->displayTeachersAbsences();
    }
   /* public function getAbsences2()
    {
        $this->absences = DB::table('absences')->get();
    }*/
    public function getAbsences()
    {
        $this->absences = DB::table('absences')->get();
    }
}
/*
Absence::with('users');
 'description',
        'hour',
        'turn',
        'user_id',*/
