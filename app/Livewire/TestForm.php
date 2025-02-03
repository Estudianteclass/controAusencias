<?php

namespace App\Livewire;

use Livewire\Component;

class TestForm extends Component
{

public $name;

public function submit()
{
    $this->validate(['name' => 'required|string|max:255']);
    session()->flash('message', 'Form submitted successfully!');
}

public function render()
{
    return view('livewire.test-form');
}
}
