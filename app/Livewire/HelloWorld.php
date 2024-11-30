<?php

namespace App\Livewire;

use Livewire\Component;

class HelloWorld extends Component
{
    public $message = "Hey this is Dynamic Message";
    private $greeting = "Im using Private Message";

    public $counter = 1;

    public function increment() {
        $this->counter++;
    }

    public function decrement() {
        $this->counter--;
    }

    public function render()
    {
        return view('livewire.hello-world', ['greeting' => $this->greeting]);
    }
}
