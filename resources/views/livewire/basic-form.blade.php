<div>
    <h1>{{$message}}</h1>
    <input type="text" wire:model.blur="message">

    <button wire:click="updateMessage">Submit</button>
</div>
