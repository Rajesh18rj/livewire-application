two ways to call livewire Component
1. @livewire('hello-world')
2. <livewire:hello-world />

   We have Two ways to render the livewire component 
1. view (blade) file la kuduthu render panrathu
2. layout file la kuduthu render panrathu.. (Direct ah route la livewire name kuduthu render panrathu..) 


 layout la kuduthu epdi render panrathunaa..    
> php artisan livewire:layout


# How to pass the data to the component

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
    Lifecycle hooks in Livewire are like giving instructions to your component for specific moments while it’s doing its job. They help you control what happens when:
    
    The component starts working (e.g., setting things up when it appears).
    The component reacts to changes (e.g., updating when data changes).
    The component stops working (e.g., cleaning up when it’s removed).
    It’s all about saying, "Hey, when this happens, do that!" So your component can handle different tasks at the right time without messing up. 😊

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
        if incremented value is 4 .. before increment that value is 3 .. that was this doing.. 

        public function hydrate(){
//        dump('Hydrate Method', $this->count);

        if($this->count == 5) {
            $this->count == 0;
        }
    }


3) boot()

    this is similar to mount method..

    it render only one time when the component is loaded


            Okay! Imagine you’re building a toy car with a remote. 🎮🚗
            
            The boot method is like setting up the remote to talk to the car before you even start driving it. You’re saying:
            
            "Make sure the batteries are in!"
            "Connect the car and the remote so they can talk to each other!"
            "Set the car's wheels straight so it doesn’t go in circles!"
            In Livewire, the boot method is like that setup. It gets everything ready for the Livewire component (your toy car) before it starts working.
            
            So, you use the boot method to:
            
            Prepare things the component will need.
            Set up listeners (like the car listening for the remote).
            Share special rules if the component is part of a group (like all toy cars following the same speed limit).
            It’s all about getting things ready before the action starts! 🚀

public function boot(){
    dd('Boot method');
}

boot() method renders just before mount() method.. 

4) updating()

   Okay! Imagine you have a magic box (Livewire) that shows something on your computer screen, like your favorite cartoon character's face. Whenever you do something, like click a button or type a name, the magic box updates what’s on the screen without you needing to refresh the whole page.

Now, the updating method in Livewire is like a helper in the magic box. It steps in before the screen changes. It checks if everything is okay or if something special needs to happen.

5) updated()

    updating()	Called before updating a component property
    updated()	Called after updating a property

            public function rendering(){
                dump('Rendering View');
            }


6) rendering()	

Called before render() is called

    if you want to render anything before render().. you can use rendering method.. 

5) rendered()

        public function rendered(){
        dump('Rndered View');
   }
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
    when you inspect this during clicking submit , you can see the ajax doing things in network -> update.. it doesnt reload the page .. when i trigger submit button its reload the  component and sync it .. 

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

Ipo namma new ah livewire component create pannii render panna , athu app.layout la iruka function ah default ah yeduthukum.. namaku apdi venam nu nenacha app.layout la irunthu yedukka venam vera oru layout la irunthu yedukanum nu nenacha .. 

    public function render()
    {
        return view('livewire.contact-form')
                    ->layout(loyouts.another-layout);
    }
intha mari render func la kudukanum.. 
illana athu default ah , app.layout oda value va yeduthuttu vanthurum.. 


after creating form for front-end 
ipo antha submit button ah click panna work aaganum.. athuku firstuu.. 

                    {{--Button--}}
                    <button wire:click="saveContactForm" type="submit" class="btn btn-success">Submit</button>

                    public function saveContactForm(){
                        dump('button clicked');
                    }
public ah click pannathum.. saveContact function trigger aaguthanu check panrathukaaga ipdi kuduthu papom.. 

when i press the submit button , nothing happens.. coz we are expecting a submit type in button tag 

change that type="submit" to -> type="button"

but we dont do this in button.. we are doing this in form tag -> <form wire:submit="saveContactForm" action="">

and change the button type to submit.. 

now press the submit button.. it works 

Our form submission is working.. Now we have to capture the form input

form la irunthu input ah capture panrathuku livewire la wire model directives iruku.. 
ellla inputs kum , wire model directive ah bind pannanum...

first ella input tag kum wire model directives kudukalam.. 
wire:model="name"
for email
for phoneNumber , etc.. 

ipo intha wire model la kuduthathellam class file la public property la define pannanum..
so apo than namma form fill up panni submit pannaa, intha form input values capture aagum properties or values ah.. 

then epdi work aaguthunu dd pani papom..

    public function saveContactForm(){
        dd([
        'name' => $this->name,
        'email' => $this->email,
        'phoneNumber' => $this->phoneNumber,
        'message' => $this->message,
        'nationality' => $this->nationality,
        'gender' => $this->gender,
        'newsletter' => $this->newsletter,
        ]);
}

now go browser and fill the form .. yeah we get the value we give in the form.. 

# building robust form - Form object and Validation Technique

    public function saveContactForm(){

        $this->validate([
            'name'=> 'required|string|min:3|max:50',
            'email'=> 'required|email|max:50',

        ]);

first name and email mattum verify panrom nu vachupom.. 

fill pannama submit kuduthu papom.. its validated , but indication yethum katala so
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror

now its shows error message.. ithey mari error function ah ella field kum yeluthalam 

we can also customize the validation error message.. 

    protected function messages(){
        return [
            'name.required' => 'MF name is required',
            'name.string'=> 'MF name must be string',
            'name.min'=> 'MF name must be at least 3 characters',
            'name.max'=> 'MF name must be less than 50 characters',
            'email.required' => 'MF email is required',
            'email.email'=> 'MF email must be a valid email',
            'phoneNumber.required' => 'MF phone number is required',
            'phoneNumber.digits' => 'please enter a valid phone number',
            'message.required' => 'MF message is required',
            'message.min' => 'MF message must be at least 3 characters',
            'message.max' => 'MF message must be less than 500 characters',
            'nationality.required' => 'MF nationality is required',
            'gender.required' => 'MF gender is required',
           
        ];
    }

intha maari.. 

next we are going to , validate panna data va epdi database la store panrathunu pakalam.. 

# Real time form validation and submission

Real Time Validation::

Livewire la real time validation nu onnu irukku athu enna pannum naa... namma type pannitu irukum pothey errror iruntha live ah vey sollirum

wire:model.live -> ithu input field la type pannum pothey trigger aagum.. 
wire:model.blur   --> outside of the input box yethavathu click panna trigger aagum 

    // Real-time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

(Note we must write protected rules)

Okay! Imagine you’re filling out a form, and there's a helpful little robot (Livewire) watching what you type.

Here’s what’s happening:

Robot’s Job: The robot looks at each box (like "Name" or "Email") as you type. It keeps track of what you wrote.

Magic Code (updated): The magic code says: "Hey robot, whenever someone changes something in a box, check just that box!"

Super-Quick Check (validateOnly): The robot doesn’t check the whole form, just the one box you changed, to see if there’s anything wrong (like a missing name or invalid email).

How It Feels for You: As soon as you type something wrong, the robot quickly tells you what’s wrong right next to the box—like magic!

This makes the robot super fast and helpful without waiting for you to finish the whole form! 🚀

        we can also use this with wire:model.blur

ok ipo namma submit pannuthum form data varuthula atha database la store panna porom.. 

make a Model and Migration files first.. 

            $table->id();
            $table->string('name', 50)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('phoneNumber', 20)->nullable();
            $table->text('message')->nullable();
            $table->string('nationality', 20)->nullable();
            $table->string('gender', 10)->nullable();
            $table->boolean('newsletter', 50)->default(false)->nullable();
            $table->timestamps();

    Then add protected fillables in Model.. 

Then come to Class file .. 

    //Form Submission
    public function saveContactForm(){

        //validation
        $this->validate();

       $contact = Contact::create($this->all());
       dd($contact);
    }

Now try to submit the form.. it works .. Go and check the database the datas are stored there.. 

Ipo namaku save pannathuku aprom flash message kaatanum nu nenacha..

        //Store
        $contact = Contact::create($this->all());
    
       if($contact) {
           session()->flash('success', 'Your Contact has been saved..');
       }
       else {
           session()->flash('error', 'Your Contact failed to save');
       }

in blade file put this before form

    {{--Session Message--}}
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif

in here we get key value pair of success and error values.. 

goto  Form submission try to create new one , fill the form.. and click submit button you got the success message in top .. 

but submit aana aprom form clear aagala .. we are going to fix that.. 

       //Reset after submission
       $this->reset();                #giving this after storing data.. 

this reset method also works well.. 










