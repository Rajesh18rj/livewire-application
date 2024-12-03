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

# LifeCycle Methods 
        Refers to the predifened method or functions which are automatically invoked at a specific point during the execution or lifecycle of an application or component.
        These methods allow developers to hook into various stages of the lifcycle to perform initialization, cleanup , stata management and other actions .
        So in the Contex of web development life methods typically include 
            1. initialization -> in this phase the method called when a component or page is firstly created or mounted
            2. update   -> in this phase the methods will be called when state or data changes within the component. 
            3. rendering -> in this phase the methods will be called when the component is about to render or has finished rendering
            4. unmounting -> in this phase component states will be cleaned up.

1) mount()
     Component render aagurathuku munnadiye mount() method render aagirum.. 

        public $count = 1;           #intha mari value initialize panrathu not a preferable

        public function mount(){
            $this->count = 2;
        }

        ipdi mount method la kuduthaa.. mela kudutha count value 1 ah mount method override panni ans 2 nu kedaikum.. 

    ipo epdi yethavathu props ah intha component la receive panrathunu pakalam.. 
        welcome view la counter component ah render pannirukom (<livewire:counter />) In some cases namaku yethavathu props or data va counter component moolamaa pass pannanum nu nenecha , inga (Counter.php) receive panni , inga(counter.blade.php) render pannanum nu nenacha , atha epdi panrthu ? 

    So Livewire provides , the flexibility to pass the props in the component as well .
        A prop in Livewire refers to public properties of the Livewire component. These properties are part of the Livewire state and are automatically kept in sync between the frontend (Blade) and backend (PHP).
        ex-> public $counter = 1;   (this is props)

        <livewire:counter :message="'Hey im from welcome blade'" />  (inga pass panni) .. 

    (inga get panni)
        public $message;

        public function mount($message){
            $this->count = 2;
            $this->message = $message;
        }
     
     (blade file la view panlam..)

mount method la than ithellam panna mudiyum.. 

Then this mount() method used for receiving parameters through routes.. 
crud operations lam pannum pothu namaku route la irunthu paramete pass panra mari situations varum.. 
        Route::get('/counter/{id}', Counter::class);

mukkiyama niyabaham vachuka vendiyathu ennanaa.. component render aagurathuku munnadiye mount() method than render aagum..
    

2) hydrate()

    when your component is loaded or reloaded this will trigger the hydrate method..  


    -----------------------------------------------------------------------------------------------------


# Data Binding
1. Real-Time Sync Between Front-End and Back-End

Livewire supports 2 types of data binding 
1. One way data binding ->this type of data binding involves the full of single direction(component to view only) 
2. two way data binding -> This type of data binding involves both direction .. (component to view and view to the component)

 Livewire makes it easy to bind a component property's value with form inputs using wire:model.

        In order to bind any data from the form input we will have to use this wire:model()
1. Oneway data binding

   <input type="text" wire:model="message">

   public $message = 'Welcome to Programming Fields';
 the data is passing from the component class to component view ..    

2. Two way data binding

    <h1>{{$message}}</h1>
    <input type="text" wire:model="message">
    <button wire:click="updateMessage">Submit</button>

        public function updateMessage(){

   }
when i give something in input field .. and press the submit it , that message also changing .. that is two way binding.. 
    when you inspect this during clicking submit , you can see the ajax doing things in network -> update.. it doesnt reload the page .. when i trigger submit button its reload the the component and sync it .. 

wire:model.live

<input type="text" wire:model.live="message">
        this will send property updates automatically when we will type anything inside this input type.. 

<input type="text" wire:model.live.debounce="message">
            when i stop typing this triggered the ajax call .. (Namma type panitu irukum pothu live la kaatathu.. Hand ah keyboard la irunthu yedutthathum than namma type pannathu varum.. )

<input type="text" wire:model.live.debounce.500ms="message">
          We can delay that too.. Namma type panni 500 ms aprom.. type pannathu show aganum nu nenacha itha use pannanum.. 

Next blur Event..
<input type="text" wire:model.blur"message">
    ithu enna pannum naa.. input field la type panratha live ah ajax req ah execute pannama, namma epo outside la press or click panramo apo execute pannum.. 

# Form Handling..

