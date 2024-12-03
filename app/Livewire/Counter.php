<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count;
    public $message;

    public function mount($message='null', $id='null'){
        $this->count = 2;
        $this->message = $message;
        echo $id;
    }

    public function hydrate(){
        dump('Hydrate Method', $this->count);

        if($this->count == 5) {
            $this->count == 0;
        }
    }

    public function increment(){
        $this->count++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
