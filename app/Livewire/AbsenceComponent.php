<?php

namespace App\Livewire;

use Livewire\Component;

class AbsenceComponent extends Component
{
    public $absences=[];
    public $user;
    public $absence;
    public $description;
    public $hour;
    public $turn;
    public $user_id;
    public function render()
    {
        return view('livewire.absence-component');
    }
public function createAbsence(){}
public function openAbsenceForm(){}
public function closeAbsenceForm(){}
public function deleteAbsence(){}
public function getAbsences(){}
}
/*

 'description',
        'hour',
        'turn',
        'user_id',*/
