<?php

namespace App\Livewire;

use Livewire\Component;

class ComponentSwitch extends Component
{

    public $usedComponent='AbsenceComponent';


    public function render()
    {
        return view('livewire.component-switch');
    }
    public function switchComponent($component){
        $this->usedComponent=$component;
    }
}
