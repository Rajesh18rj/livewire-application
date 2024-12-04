<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $phoneNumber;

    public $message;
    public $nationality;
    public $gender;
    public $newsletter;

    //Validation Rules
    protected $rules = [
        'name'=> 'required|string|min:3|max:50',
        'email'=> 'required|email|max:50|unique:contacts,email',
        'phoneNumber'=> 'required|digits:10|unique:contacts,phoneNumber',
        'message'=> 'required|min:3|max:500',
        'nationality'=> 'required',
        'gender'=> 'required',
    ];

    //Custom Error Messages
    protected function messages(){
        return [
            'name.required' => 'Hey buddy, name is required',
            'name.string'=> 'Hey buddy, name must be string',
            'name.min'=> 'Hey buddy, name must be at least 3 characters',
            'name.max'=> 'Hey buddy, name must be less than 50 characters',
            'email.required' => 'Hey buddy, email is required',
            'email.email'=> 'Hey buddy, email must be a valid email',
            'email.unique'=> 'Hey buddy, this email is already taken',
            'phoneNumber.required' => 'Hey buddy, phone number is required',
            'phoneNumber.digits' => 'please enter a valid phone number',
            'phoneNumber.unique' => 'Hey buddy, this phone number is already taken ',
            'message.required' => 'Hey buddy, message is required',
            'message.min' => 'Hey buddy, message must be at least 3 characters',
            'message.max' => 'Hey buddy, message must be less than 500 characters',
            'nationality.required' => 'Hey buddy, nationality is required',
            'gender.required' => 'Hey buddy, gender is required',
        ];
    }

    // Real-time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    //Form Submission
    public function saveContactForm(){

        //validation
        $this->validate();

        //Store
       $contact = Contact::create($this->all());

       //Reset after submission
       $this->reset();

       //Flash Message
       if($contact) {
           session()->flash('success', 'Your Contact has been saved..');
       }
       else {
           session()->flash('error', 'Your Contact failed to save');
       }

    }


    // Render
    public function render()
    {
        return view('livewire.contact-form');
    }
}
