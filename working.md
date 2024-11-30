two ways to call livewire Component
1. @livewire('hello-world')
2. <livewire:hello-world />

   We have Three ways to render the livewire component 
1. view (blade) file la kuduthu render panrathu
2. layout file la kuduthu render panrathu.. (Direct ah route la livewire name kuduthu render panrathu..) 


 layout la kuduthu epdi render panrathunaa.. 
> php artisan livewire:layout


# 
How to pass the data to the component

    data pass pannanum naa.. controller la panra mari variable ah return view la pass pannanum nu avasiyam illa.. 
direct ah public nu class la declare panni data va pass panikalam..

```php
    private $greeting = "Im using Private Message";
```
    athey mari private variable or function view la direct ah access panna mudiyathu.. 

apdi access pannanum naa.. return view la  array kuduthu than get pannanum.. 
```php
    , ['greeting' => $this->greeting])
```
athey mari protected variable or function ah pass pannanum nalum ipdi than pannanum.. 

# Action
    Livewire actions are methods on your component that can be triggered by frontend interactions like clicking a button or submitting a form.
        wire:click
        wire:submit
        wire:model
        wire:navigate

--In View file--
    <button wire:click="increment">Increment</button>

--In Class File--
    public function increment() {
    $this->counter++;
    }





    



