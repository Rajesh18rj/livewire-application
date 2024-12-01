<?php

namespace App\Livewire;

use Livewire\Component;

class Greeting extends Component
{
    public $message = "Rajesh is in-Line Component checking";
    public function render()
    {
        return <<<'HTML'
        <div>
            Hi Iam from Livewire Inline Component <br/>
            {{ $message }}
        </div>
        HTML;
    }
}
