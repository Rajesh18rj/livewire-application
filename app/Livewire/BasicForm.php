<?php

namespace App\Livewire;

use Livewire\Component;

class BasicForm extends Component
{
    public $message = 'Welcome to Programming Fields';

    public function updateMessage(){

    }
    public function render()
    {
        return view('livewire.basic-form');
    }
}
