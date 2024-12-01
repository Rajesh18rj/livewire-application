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

Livewire supports two types of components
# class component  
    this we previously saw , it contains class and view file 
# inline component
    livewire provides flexibility to inline component as well, Inline component la enna irukum naa html file class file kullaiye irukum..
    
  > php artisan make:livewire Greeting --inline

  Namma Normal component la panrathu ellamey ithulaiyum panlam.. 

  then ipo Livewire la Oru folder kulla iruka component ah call pannanum nu nenacha , antha folder name um serthu kudukanum.. 
        for example -> Livewire -> Message -> Greeting.php
the calling component should be -> <livewire:message.greeting />

# Livewire Directives 
    Livewire Provides few directives to handle different actions .. 

        wire:click -> This use to perform any click event and this will perform JS Script event.. This click will basically for any button or any anchor link or any span tag which want to perform click.
        We can render a different component , so your page wont refresh and it will navigate to the diff component.. 

        wire:submit -> This will use to handle form submission events.. When you have a Form and you want to perform the Form submit handling , then that form you will have to apply this. It will submit your form data 

        wire:model -> This will use to capture the input value. Example you have Input fields title and content and you want to capture the entered text inside that input field, then you will have to bind the event as wire model 

        wire:loading -> Its kind of loader kind of thing.. Yethavathu namma save panrom naa,  Namma response server side la complete aaga wait pannum bothu , this will display loading .. 

        wire:navigate -> when you want to navigate different component(different route or url) without reloading page, you can use this.
etc.. 






    



