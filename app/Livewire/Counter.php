<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count;
    public $message;
    public $userName;

    // Mount
    public function mount($message='null', $id='null'){
        $this->count = 2;
        $this->message = $message;
        echo $id;
    }
    // Hydrate
    public function hydrate(){
//        dump('Hydrate Method', $this->count);

        if($this->count == 5) {
            $this->count = 0;
        }
    }

    // Boot
    public function boot(){
//        dd('Boot method');
    }

    // Updating

    public function updating($userName) {
        dump($userName);
    }

    //Updated

    public function updated($username){
        dump($username);
    }

    public function increment(){
        $this->count++;
    }

    public function rendering(){
        dump('Rendering View');
    }

    public function rendered(){
        dump('Rendered View');
    }
    // Render
    public function render()
    {
        dump('Render view');
        return view('livewire.counter');
    }
}
